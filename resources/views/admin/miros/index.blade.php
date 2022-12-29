@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header">
  <button class="btn btn-warning">
      Miro
    </button>
  </div>
  <div class="card-body">
    <div class="container"></div>
  </div>
</div>

<script>
  var button = document.querySelector('button')
  button.addEventListener('click', () => {
    miroBoardsPicker.open({
      clientId: '3458764538172566616', // Replace it with your app ClientId
      action: "select",
      success: (data) => {
        document.querySelector(".container").innerHTML = `
          <iframe
            class="iframe"
            width="1300"
            height="750"
            src="https://miro.com/app/live-embed/${data?.id}/"
            frameborder="0"
            scrolling="no"
            allowfullscreen
          ></iframe>`;
      }
    })
  })
</script>

@endsection