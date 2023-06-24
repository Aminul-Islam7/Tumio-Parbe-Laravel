<form method="POST" action="">
  @csrf

  <div class="mb-2">
    <label for="code">Enter code</label>
    <div class="form-text bangla mb-2">নম্বরে পাঠানো ৫ সংখ্যার কোডটি লিখুন</div>
    <input type="text" class="form-control" name="code" placeholder="▢▢▢▢▢" id="" required>
    <div class="invalid-feedback bangla">
      ফোন নম্বরটি সঠিক নয়
    </div>
    
  </div>
          
  {{-- Submit button --}}
  <button type="submit" class="btn btn-primary col-12 mt-2" id="">Submit</button>

</form>