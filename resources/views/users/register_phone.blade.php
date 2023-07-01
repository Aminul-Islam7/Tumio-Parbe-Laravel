<x-layout>
  <x-slot name="title">
    {{$title}}
  </x-slot>

  <div id="register" class="container">
    <div class="heading">
      <h1>Student Registration</h1>
      <small class="text-body-secondary bangla">Account registration for course enrollment</small>  
    </div>

    <div class="form-card">

      <form method="POST">
        @csrf

        <div class="mb-2">
          <label for="phone">Phone Number</label>
          <div class="form-text bangla mb-2">আপনার সবচেয়ে active ফোন নম্বরটি দিন। এই নম্বরে OTP পাঠানো হবে।</div>
          <div class="input-group">
            <span class="input-group-text">+88</span>
            <input type="text" class="form-control" value="01634555545" name="phone" placeholder="01XXXXXXXXX" id="phone-field"  aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback phoneError bangla">
              ফোন নম্বরটি সঠিক নয়
            </div>
          </div>
        </div>
               
        {{-- Submit button --}}
        <button type="submit" class="btn btn-primary col-12 mt-2" id="send-code-button" disabled>
          Send Code
          <div class="spinner-border spinner-border-sm ms-1 visually-hidden" id="spinner"></div>
        </button>
      </form>
    </div>
  </div>

</x-layout>