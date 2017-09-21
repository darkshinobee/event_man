<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Paystack;
use Auth;
use App\BookedEvent;
use App\Event;
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
        ->update(['ticket_count' => $event->ticket_count - $request->quantity]);

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
          ->update(['ticket_count' => $event->ticket_count - $book->quantity,
       'early_max' => $event->early_max - $book->quantity]);
      }
      elseif ($book->ticket_type == 2) {
        DB::table('events')->where('id', $event->id)
          ->update(['ticket_count' => $event->ticket_count - $book->quantity,
       'regular_max' => $event->regular_max - $book->quantity]);
     }else {
       DB::table('events')->where('id', $event->id)
        ->update(['ticket_count' => $event->ticket_count - $book->quantity,
      'vip_max' => $event->vip_max - $book->quantity]);
     }
     return redirect()->action('EventController@orderSuccess', $reference);
    }else {
      return redirect()->route('order_fail', $reference);
    }
  }
}
