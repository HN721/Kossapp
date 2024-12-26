<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostumerInformationStoreRequest;
use App\Interfaces\BoardingHouseRepositoryInterfaces;
use App\Interfaces\TransactionRepositoryInterfaces;
use Illuminate\Http\Request;

class BookingController extends Controller

{
    private TransactionRepositoryInterfaces $transactionRepository;
    private BoardingHouseRepositoryInterfaces $boardingHouseRepository;
    public function __construct(
        BoardingHouseRepositoryInterfaces $boardingHouseRepository,
        TransactionRepositoryInterfaces $transactionRepository
    ) {

        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->transactionRepository = $transactionRepository;
    }
    public function check()
    {
        return view('pages.check-booking');
    }
    public function booking(Request $request, $slug)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        return redirect()->route('booking.information', $slug);
    }
    public function information($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room_id']);
        return view('pages.booking.information', compact('boardingHouse', 'transaction', 'room'));
    }

    public function  saveInformation(CostumerInformationStoreRequest $request, $slug)
    {
        $data = $request->validate();
        $this->transactionRepository->saveTransactionDataToSession($data);
        dd($this->transactionRepository->getTransactionDataFromSession());
    }
}
