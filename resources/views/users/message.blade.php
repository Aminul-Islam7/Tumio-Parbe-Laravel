<x-layout>
  <x-slot name="title">
    {{$title}}
  </x-slot>

  <div id="register" class="container">
    <div class="heading">
      <h1>Send Message</h1>
    </div>

    <div class="form-card">

      <form method="POST" action="http://api.greenweb.com.bd/api.php">
        @csrf

        <input type="hidden" name="token" value="96480256571687553817f2b04c4e726a6931f8ada2dff09d61ac">

        <div class="mb-3">
          <label class="required" for="to">Phone Number</label>
          <div class="input-group">
            <span class="input-group-text">+88</span>
            <input type="number" class="form-control" name="to" placeholder="01XXXXXXXXX" required>
          </div>
        </div>
        
        <div class="mb-3">
          <label class="required" for="message">Message</label>
          <textarea class="form-control" name="message" rows="4" placeholder="Type your message here.." required></textarea>
        </div>
       
        {{-- Submit button --}}
        <button type="submit" class="btn btn-primary col-12 mt-2">Send <i class="fa-solid fa-paper-plane"></i></button>
      
      </form>
    </div>
  </div>

</x-layout>