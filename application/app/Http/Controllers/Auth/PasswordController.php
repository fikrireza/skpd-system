<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\View\Factory;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use App\Http\Requests\Auth\EmailPasswordLinkRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use DB;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
	 * Send a reset link to the given user.
	 *
	 * @param  EmailPasswordLinkRequest  $request
	 * @param  Illuminate\View\Factory $view
	 * @return Response
	 */
	public function postEmail(EmailPasswordLinkRequest $request, Factory $view)
	{
        $email = $request->only('email');
        $nama   = DB::table('users')->where('email', $email)->value('nama');

		$view->composer('emails.password', function($view) use($nama) {
            $view->with([
                'title'   => 'Password reminder',
                'intro'   => 'To reset your password ',
                'nama'    => $nama,
                'expire'  => 'Link ini akan hangus pada ',
                'minutes' => ' menit',
            ]);
        });

    $SuksesEmail = Password::sendResetLink($request->only('email'), function (Message $message) {
                    $message->subject('Reset Password');
                });

        switch ($SuksesEmail) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('sukses', 'Silahkan Periksa Kotak Pesan Atau Folder Spam Anda');

            case Password::INVALID_USER:
                return redirect()->back()->with('error', 'Maaf Email Yang Anda Masukkan Tidak Terdaftar');
        }
	}

	/**
	 * @param  ResetPasswordRequest  $request
	 * @return Response
	 */
	public function postReset(ResetPasswordRequest $request)
	{
		$filter = $request->only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$SuksesReset = Password::reset($filter, function($user, $password) {
			$this->resetPassword($user, $password);
		});

		switch ($SuksesReset) {
			case Password::PASSWORD_RESET:
				return redirect()->to('/')
                        ->with('passwordbaru', 'Password Baru Anda Telah Berhasil Dirubah.');

			default:
				return redirect()->back()
						->with('error', '')
						->withInput($request->only('email'));
		}
	}
}
