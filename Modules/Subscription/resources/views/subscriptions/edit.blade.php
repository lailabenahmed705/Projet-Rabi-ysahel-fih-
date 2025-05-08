
@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Subscription')

@section('content')
<div class="container">
  <h4 class="mb-4">Edit Subscription</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">User</label>
      <select name="user_id" class="form-control" required>
        @foreach ($users as $user)
          <option value="{{ $user->id }}" {{ $subscription->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Plan</label>
      <select name="plan_id" class="form-control" required>
        @foreach ($plans as $plan)
          <option value="{{ $plan->id }}" {{ $subscription->plan_id == $plan->id ? 'selected' : '' }}>{{ $plan->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Start Date</label>
      <input type="date" name="start_date" value="{{ $subscription->start_date ? $subscription->start_date->format('Y-m-d') : '' }}" class="form-control">

    </div>

    <div class="mb-3">
      <label class="form-label">Due Date</label>
      <input type="date" name="due_date" value="{{ $subscription->due_date ? $subscription->due_date->format('Y-m-d') : '' }}" class="form-control">

    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
