<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header bg-info text-white text-center">
                    <h5>Quote view</h5>
                </div>
                <div class="card-body">
                    <form id="replyForm">
                        <div class="form-group">
                            <label for="name">Time</label>
                            <input type="text" class="form-control" value="{{ $quote->time }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Date</label>
                            <input type="text" class="form-control" value="{{ $quote->date }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" value="{{ $quote->phone }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="hidden" id="quote_id" value="{{$quote->id}}">
                            <input type="text" class="form-control" id="name" value="{{ $quote->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="hidden" id="quote_id" value="{{$quote->id}}">
                            <input type="text" class="form-control" id="name" value="{{ $quote->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $quote->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="desp">Message Description</label>
                            <textarea class="form-control" id="desp" readonly>{{ $quote->desp }}</textarea>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
