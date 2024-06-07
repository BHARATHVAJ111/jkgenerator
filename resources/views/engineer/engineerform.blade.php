<div class="container-fluid">
    <form action="{{route('engineer.send')}}" method="POST" id="indentForm">
        @csrf
        <div class="">
            <div class="">
                <div class="row">
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required>
                        <div id="nameError" class="error-message">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required>
                        <div id="emailError" class="error-message">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required>
                        <div id="passwordError" class="error-message">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="phone">Phone Number:</label>
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" required>
                        <div id="phoneError" class="error-message">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around mt-3">
                <a href="{{ route('sales.index') }}">
                    <button class="btn btn-danger">Cancel</button>
                </a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
    </form>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<style>
    .ui-autocomplete {
        z-index: 10000;
        /* Set an even higher z-index value */
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
