<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Paystack;
use Auth;
use App\BookedEvent;
use App\Event;

class PaymentController extends Controller
{
  public function redirectToGateway(Request $request)
  {
    $customer = Auth::guard('customer')->user();

    $book = new BookedEvent;
    $book->event_id = $request->event_id;
    $book->attendee_id = $customer->id;
    $book->ticket_type = $request->ticket_type;
    $book->amount = $request->amount/100;
    $book->quantity = $request->quantity;
    $book->reference = $request->reference;
    if ($request->ticket_type == 0) {
      $book->status = 1;
      $book->save();
      $event = Event::find($request->event_id);
      DB::table('events')->where('id', $event->id)
        ->update(['ticket_count' => $event->ticket_count - $request->quantity]);
    }else {
      $book->status = 0;
      $book->save();
      return Paystack::getAuthorizationUrl()->redirectNow();
    }
  }

  public function handleGatewayCallback()
  {
    $paymentDetails = Paystack::getPaymentData();
    if ($paymentDetails['data']['status'] == "success") {
      DB::table('booked_events')->where('reference', $paymentDetails['data']['reference'])
        ->update(['status' => 1]);
      $book_id = DB::table('booked_events')->where('reference', $paymentDetails['data']['reference'])
        ->value('id');
      $book = BookedEvent::find($book_id);

      $event_id = DB::table('booked_events')->where('reference', $paymentDetails['data']['reference'])
        ->value('event_id');
      $event = Event::find($event_id);

      if ($book->ticket_type == 1) {
        DB::table('events')->where('id', $event_id)
          ->update(['ticket_count' => $event->ticket_count - $book->quantity,
       'early_max' => $event->early_max - $book->quantity]);
      }
      elseif ($book->ticket_type == 2) {
        DB::table('events')->where('id', $event_id)
          ->update(['ticket_count' => $event->ticket_count - $book->quantity,
       'regular_max' => $event->regular_max - $book->quantity]);
     }else {
       DB::table('events')->where('id', $event_id)
        ->update(['ticket_count' => $event->ticket_count - $book->quantity,
      'vip_max' => $event->vip_max - $book->quantity]);
     }
    }else {
      dd('Transaction Failed!');;
    }
  }
}
