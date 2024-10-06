@extends('layouts.master')

@section('header')
    <title>website Event</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
  
@endsection

@section('content')
   <!-- ===================== banner part start====================== -->
    <section id="banner" class="single-banner">
        <div class="d-none d-lg-block" id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <h3 class="text-center important-tag">Get a Quote</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== banner part end====================== -->

     <!-- ===================== Event part start====================== -->
     <section id="event" style="padding-bottom: 150px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="event-left-item">
                        <a href="#"><img src="{{asset('frontend/images/favicon.png')}}" alt="" width="70" class="img-fluid"> DominyTech</a>
                        <h3>Planning Session</h3>
                        <p>Got a website or custom website idea? Let’s bring your vision to life with Dominytech! Reach out today on<span style="color: #000;font-weight: 500;">WhatsApp at +8801312597073, email us at dominytech.bd@gmail.com</span>, or schedule a Zoom call. Let's collaborate and turn your project into a reality with efficiency and creativity.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="middle-item">
                        <h3>Phone Number</h3>
                        <!-- Input field for phone number -->
                        <div class="mt-3">
                            <input id="phone" type="tel" class="form-control">
                        </div>

                        <div class="calendar">
                            <div class="calendar-header">
                                <button id="prevMonth" class="btn btn-prev">Previous</button>
                                <h3 id="monthName"></h3>
                                <button id="nextMonth" class="btn btn-next">Next</button>
                            </div>
                            <div class="calendar-grid text-center" id="calendarDays">
                                <!-- Days of the week -->
                                <div class="calendar-day-header">Sun</div>
                                <div class="calendar-day-header">Mon</div>
                                <div class="calendar-day-header">Tue</div>
                                <div class="calendar-day-header">Wed</div>
                                <div class="calendar-day-header">Thu</div>
                                <div class="calendar-day-header">Fri</div>
                                <div class="calendar-day-header">Sat</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="event-time-text">
                        <h3>Select Your Free Time:</h3>
                    </div>
                    <div class="time-scroll-container">
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="8:00am">8:00am</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="9:00am">9:00am</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="10:00am">10:00am</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="11:00am">11:00am</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="12:00pm">12:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="1:00pm">1:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="2:00am">2:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="3:00pm">3:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="4:00pm">4:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="5:00am">5:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="6:00pm">6:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="7:00pm">7:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="8:00pm">8:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="9:00pm">9:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="10:00pm">10:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="11:00pm">11:00pm</button>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-time-event form-control" data-time="12:00am">12:00am</button>
                        </div>
                        <!-- Add more time buttons as needed -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Event part End====================== -->

    <!-- Modal -->
    <div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true" width="500">
        <div class="modal-dialog">
            <form id="eventFrom">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="timeModalLabel">Selected Time Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Selected Time:</strong> <span id="selectedTime"></span></p>
                        <p><strong>Selected Date:</strong> <span id="selectedDate"></span></p>
                        <p><strong>Phone Number:</strong> <span id="selectedPhone"></span></p>
                        <div class="mb-3">
                            <label for="e_name" class="form-label">Enter Name</label>
                            <input type="text" class="form-control" id="e_name" placeholder="Your name here">
                        </div>
                        <div class="mb-3">
                            <label for="e_email" class="form-label">Enter Email</label>
                            <input type="text" class="form-control" id="e_email" placeholder="Your email here">
                        </div>
                        <div class="mb-3">
                            <label for="e_desp" class="form-label">Enter Description</label>
                            <textarea id="e_desp" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="e_submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
@endsection