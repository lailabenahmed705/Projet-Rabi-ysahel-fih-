@extends('layouts/contentNavbarLayout')

@section('title', 'Add Subscription')

@section('content')
<div class="container">
  <h4 class="mb-4">Add Subscription</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('subscriptions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">User</label>
      <select name="user_id" class="form-control" required>
        <option value="">Select User</option>
        @foreach ($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Plan</label>
      <select name="plan_id" class="form-control" required>
        <option value="">Select Plan</option>
        @foreach ($plans as $plan)
          <option value="{{ $plan->id }}">{{ $plan->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
    <label for="starts_at" class="form-label">Start Date</label>
    <input type="date" name="starts_at" id="starts_at" class="form-control" value="{{ old('starts_at') }}" required>
</div>

<div class="mb-3">
    <label for="ends_at" class="form-label">Due Date</label>
    <input type="date" name="ends_at" id="ends_at" class="form-control" value="{{ old('ends_at') }}" required>
</div>


    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection