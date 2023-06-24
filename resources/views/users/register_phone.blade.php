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

      <form method="POST" action="">
        @csrf

        <div class="mb-2">
          <label for="phone">Phone Number</label>
          <div class="form-text bangla mb-2">আপনার সবচেয়ে active ফোন নম্বরটি লিখুন। এই নম্বরে verification code পাঠানো হবে।</div>
          <div class="input-group">
            <span class="input-group-text">+88</span>
            <input type="text" class="form-control" name="phone" placeholder="01XXXXXXXXX" id="phone-field"  aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback errMsgContainer bangla">
              ফোন নম্বরটি সঠিক নয়
            </div>
          </div>
        </div>
               
        {{-- Submit button --}}
        <button type="submit" class="btn btn-primary col-12 mt-2" id="send-code-button" >Send Code</button>
      </form>
    </div>
  </div>

</x-layout>