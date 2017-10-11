<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Paystack;
use Auth;
use App\BookedEvent;
use App\Event;
use App\Extra;
use App\Transaction;

class PaymentController extends Controller
{
  public function redirectToGateway(Request $request)
  {
    $attendee = Auth::guard('customer')->user();

    $tran = new Transaction;
    $tran->event_id = $request->event_id;
    $tran->attendee_id = $attendee->id;
    $tran->reference = $request->reference;
    $tran->save();

    foreach ($request->names as $name) {
      $extra = new Extra;
      $extra->transaction_id = $tran->id;
      $extra->name = $name;
      $extra->save();
    }

    $book = new BookedEvent;
    $book->transaction_id = $tran->id;
    $book->ticket_type = $request->ticket_type;
    $book->amount = $request->amount/100;
    $book->quantity = $request->quantity;
    if ($request->ticket_type == 0) {
      $book->booking_status = 1;
      $book->save();

      $event = Event::find($request->event_id);
      $organizer = DB::table('customers')->where('id', $event->organizer_id)->first();

      DB::table('events')->where('id', $event->id)
        ->update(['ticket_bought' => $event->ticket_bought + $request->quantity]);

        return redirect()->action('EventController@orderSuccess', $request->reference);

    }else {
      $book->booking_status = 0;
      $book->save();
      return Paystack::getAuthorizationUrl()->redirectNow();
    }
  }

  public function handleGatewayCallback()
  {
    $attendee = Auth::guard('customer')->user();
    $paymentDetails = Paystack::getPaymentData();
    $reference = $paymentDetails['data']['reference'];

    if ($paymentDetails['data']['status'] == "success") {
      $tran = DB::table('transactions')->where('reference', $reference)->first();
      $book = DB::table('booked_events')->where('transaction_id', $tran->id)->first();
      DB::table('booked_events')->where('id', $book->id)->update(['booking_status' => 1]);

      $event = DB::table('events')->where('id', $tran->event_id)->first();
      $organizer = DB::table('customers')->where('id', $event->organizer_id)->first();

      if ($book->ticket_type == 1) {
        DB::table('events')->where('id', $event->id)
          ->update(['ticket_bought' => $event->ticket_bought + $book->quantity,
       'early_bought' => $event->early_bought + $book->quantity]);
      }
      elseif ($book->ticket_type == 2) {
        DB::table('events')->where('id', $event->id)
          ->update(['ticket_bought' => $event->ticket_bought + $book->quantity,
       'regular_bought' => $event->regular_bought + $book->quantity]);
     }else {
       DB::table('events')->where('id', $event->id)
        ->update(['ticket_bought' => $event->ticket_bought + $book->quantity,
      'vip_bought' => $event->vip_bought + $book->quantity]);
     }
     return redirect()->action('EventController@orderSuccess', $reference);
    }else {
      return redirect()->route('order_fail', $reference);
    }
  }
}
