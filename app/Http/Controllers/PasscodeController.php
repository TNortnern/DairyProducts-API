<?php

namespace App\Http\Controllers;

use App\Passcode;
use Illuminate\Http\Request;

class PasscodeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $old_passcode = DB::table('passcodes')
            ->latest()
            ->first()
            ->value('id');

        DB::table('passcodes')->update("is_active", 0)->where('id', $old_passcode);
        $new_passcode = DB::table('passcodes')->insert(
            [
                'passcode' => $request->passcode,
                'is_active' => 1
            ]
        );
        return $new_passcode;
    }

    //Generate Random
    public function generatePasscode()
    {
        $old_passcode = DB::table('passcodes')
            ->latest()
            ->first()
            ->value('id');
        DB::table('passcodes')->update("is_active", 0)->where('id', $old_passcode);
        $new_passcode = factory(App\Passcode::class)->create();

        return $new_passcode;
    }
}
