@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>{{ $msg ?? ''}}</h3>
    <h3>{{ session('msg') ?? ''}}</h3>


</body>

</html>
