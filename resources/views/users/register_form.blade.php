<ul class="check-list">
  <li><i class="fa-solid fa-check small"></i>
    <small class="bangla">সকল তথ্য <strong class="bangla">ইংরেজিতে</strong> লিখুন।</small>
  </li>
  <li><i class="fa-solid fa-check small"></i>
    <small class="bangla">(<span class="required"></span>) চিহ্নিত স্থান গুলো পূরণ করা আবশ্যক।</small>
  </li>
</ul>

<form method="POST" action="/users">
  @csrf

  {{-- Name --}}
  <div class="mb-3">
    <label class="required" for="name">Name</label>
    <input type="text" class="form-control is-valid" name="name" placeholder="Full name of student" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please input student's name.
    </div>
  </div>

  {{-- Age & Class --}}
  <div class="row">
    <div class="col-sm-6 col-12 mb-3">
      <label class="required" for="age">Age</label>
      <input type="number" min="3" max="19" class="form-control" name="age" placeholder="3 to 19" required>
    </div>
    <div class="col-sm-6 col-12 mb-3">
      <label for="class">Class / Grade</label>
      <input type="text" class="form-control" name="class" placeholder="e.g. Two">
    </div>
  </div>      

  {{-- School --}}
  <div class="mb-3">
    <label for="school">School</label>
    <input type="text" class="form-control" name="school" placeholder="e.g. Southpoint School & College">
  </div>

  {{-- District & Email --}}
  <div class="row">
    <div class="col-sm-6 col-12 mb-3">
      <label class="required" for="district">District</label>
      <input type="text" class="form-control" name="district" placeholder="e.g. Chattogram" required>
    </div>
    <div class="col-sm-6 col-12 mb-3">
      <label for="email">Email address</label>
      <input type="email" class="form-control" name="email" placeholder="e.g. john@gmail.com">
    </div>
  </div>


  {{-- Phone --}}
  <div class="mb-3">
    <label class="required" for="phone">Contact number</label>
    <div class="input-group">
      <span class="input-group-text">+88</span>
      <input type="number" class="form-control" name="phone" placeholder="01XXXXXXXXX" required>
      <div class="form-text bangla">আপনার সবচেয়ে active 11-digit ফোন নম্বর এখানে সঠিক ভাবে লিখুন। এই নম্বরে OTP পাঠানো হবে।</div>
    </div>
  </div>

  {{-- Facebook --}}
  <div class=" mb-3">
    <label class="required" for="facebook">Facebook Profile URL</label>
    <input type="text" class="form-control" name="facebook" placeholder="e.g. https://facebook.com/TumioParbeProfile" required>
    <div class="form-text bangla">শিক্ষার্থী যেই Facebook account দিয়ে ক্লাস গ্রুপে জয়েন করবে, সেই account এর link টা copy করে এখানে paste করুণ। Profile Link খুঁজে না পেলে, শুধু Facebook profile এর নাম টা লিখে দিন।</div>
  </div>

  {{-- Parents' Names --}}
  <div class="row">
    <div class="col-sm-6 col-12 mb-3">
      <label for="father_name">Father's Name</label>
      <input type="text" class="form-control" name="father_name" placeholder="Type here">
    </div>
    <div class="col-sm-6 col-12 mb-3">
      <label for="mother_name">Mother's Name</label>
      <input type="text" class="form-control" name="mother_name" placeholder="Type here">
    </div>
  </div>

  {{-- Student Id --}}
  <div class=" mb-3">
    <label for="student_id">Student ID (Note it down)</label>
    <input type="text" class="form-control" name="student_id" value="01 07 23" placeholder="XXXXXX" disabled readonly>
    <div class="form-text bangla">এই ID টি লিখে রাখুন। এটি ব্যাবহার করে পরবর্তীতে Login করতে হবে।</div>
  </div>

  {{-- Password --}}
  <div class="row">
    <div class="col-sm-6 col-12 mb-3">
      <label class="required" for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Type a strong password" required>
    </div>
    <div class="col-sm-6 col-12 mb-3">
      <label class="required" for="password_confirmation">Confirm Password</label>
      <input type="password" class="form-control" name="password_confirmation" placeholder="Re-type your password" required>
    </div>
  </div>
  
  {{-- Submit button --}}
  <button type="submit" class="btn btn-primary col-12 mt-2">Sign Up</button>

</form>