<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('car');

        if ($request->filled('ad')) {
            $users->where(DB::raw("CONCAT(name, ' ', surname)"), 'like', "%{$request->get('ad')}%");
        }

        if ($request->filled('yasi')) {

//            How to calculate age in mysql
//            https://www.vultr.com/docs/how-to-calculate-age-from-date-of-birth-using-timestampdiff-in-mysql/
//            TIMESTAMPDIFF(YEAR, your-date-column, CURDATE())

            $users->where(DB::raw("TIMESTAMPDIFF(YEAR, date_of_birthday, CURDATE())"), '=', $request->get('yasi'));
        }

        if ($request->filled('gender')) {
            $users->where('gender', $request->get('gender'));
        }

        if ($request->filled('markasi')) {
            $users->whereHas("car", function ($q) use ($request) {
                $q->where("brand", $request->get('markasi'));
            });
        }

        $users = $users->get();

        return view('users', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $params = $request->only([
            'name' ,
            'surname',
            'date_of_birthday',
            'gender',
            'phone',
        ]);

        User::create($params);

        return redirect()->route('users.index')->with('success', 'Yeni musteri elave olundu !!');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('show', compact('user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('form', compact('user'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $params = $request->only([
            'name',
            'surname' ,
            'date_of_birthday' ,
            'gender' ,
            'phone' ,
        ]);
        $user->update($params);

        return redirect()->route('users.index')->with('success', 'Update islemi gerceklesdi!!');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('warning', 'Qeyd etdiyiniz musteri listeden silindi!!');
    }

}
