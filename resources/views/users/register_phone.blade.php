<x-layout>
  <x-slot name="title">
    {{$title}}
  </x-slot>

  <div id="register" class="container">
    <div class="heading">
      <h1>Student Registration</h1>
      <small class="text-body-secondary bangla">কোর্সে enroll করতে student account create করুণ।</small>  
    </div>

    <div class="form-card">

      <form method="POST" action="">
        @csrf

        <div class="mb-3">
          <label class="required" for="to">Phone Number</label>
          <div class="input-group">
            <span class="input-group-text">+88</span>
            <input type="text" class="form-control" name="to" placeholder="01XXXXXXXXX" id="phone-field"  aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback bangla">
              ফোন নম্বরটি সঠিক নয়
            </div>
          </div>
          <div class="form-text bangla">আপনার সবচেয়ে active ফোন নম্বরটি এখানে লিখুন। এই নম্বরে verification OTP পাঠানো হবে।</div>
        </div>
               
        {{-- Submit button --}}
        <button type="submit" class="btn btn-primary col-12 mt-2" id="send-code-button" disabled>Send Code</button>
      
      </form>
    </div>
  </div>

</x-layout>