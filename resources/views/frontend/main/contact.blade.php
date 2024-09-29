@extends('frontend.frontend')

@section('content')
<section id="contact" class="page-section">
    <div class="container-lg">
        <div class="row my-4">
            <div class="col">
                <h2 class="mb-3">Contact</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form id="contact-form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Phone</label>
                            <input type="tel" name="mobile" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Message</label>
                            <textarea class="form-control" name="message" id="" cols="6"
                                      rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 offset-md-7 mb-3">
                            <input type="submit" value="Submit" class="btn btn-brand btn-lg w-100">
                        </div>
                    </div>
                    <p id="my-form-status"></p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection