<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Accounts\StoreAccountRequest;
use App\Http\Requests\Accounts\UpdateAccountRequest;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $query = Accounts::query();

        if ($request->has('input') && $request->input('input') != '') {
            $input = $request->input('input');
            $query->where('username', 'LIKE', "%{$input}%")
                ->orwhere('email', 'LIKE', "%{$input}");
        }

        $accounts = $query->orderBy('accountId', 'desc')->paginate(5);

        return view('admin.accounts.index', [
            'accounts' => $accounts,
            'search' => $request->input('input'),
        ]);
    }

    public function create()
    {
        return view('admin.accounts.create');
    }
    public function store(StoreAccountRequest $request)
    {
        Accounts::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('accounts.index');
    }


    public function show(string $id) {}
    public function edit($id)
    {
        $account = Accounts::findOrFail($id);
        return view('admin.accounts.edit', compact('account'));
    }

    public function update(UpdateAccountRequest $request, $id)
    {
        $account = Accounts::findOrFail($id);

        $account->username = $request->username;
        $account->email = $request->email;
        $account->role = $request->role;
        $account->status = $request->status;

        if (!empty($request->password)) {
            $account->password = Hash::make($request->password);
        }

        $account->save();
        return redirect()->route('accounts.index');
    }

    public function destroy($id)
    {
        $account = Accounts::findOrFail($id);

        $account->delete();

        return redirect()->route('accounts.index');
    }
}
