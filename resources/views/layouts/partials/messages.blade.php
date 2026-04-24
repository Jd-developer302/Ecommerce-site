{{-- @if(Session::get('success', false))
   
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success" role="alert">
            <i class="fa fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif --}}



@if(Session::get('success', false))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @php
                $data = Session::get('success');
            @endphp

            @if (is_array($data))
                @foreach ($data as $msg)
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ $msg }}',
                        timer: 3000,
                        showConfirmButton: false,
                    });
                @endforeach
            @else
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ $data }}',
                    timer: 3000,
                    showConfirmButton: false,
                });
            @endif
        });
    </script>
@endif