$(document).ready(function () {

    // web content 
    $.ajax({
        url: "/get-web-content",
        type: 'GET',
        success: function (res) {
            var logoUrl = '/upload/logo/' + res.content.logo;
            var aboutUrl = '/upload/about/' + res.content.ab_img;

            // Update the image source dynamically
            $('#logoImg').attr('src', logoUrl);
            $('#footLogo').attr('src', logoUrl);
            $('.about_left img').attr('src', aboutUrl);
            $('#ab_right_content').html(res.content.ab_content);
            $('.footer_left_desp').text(res.content.footer);

            // Update social media links
            $('.footer_fb').attr('href', res.content.facebook);
            $('.footer_twet').attr('href', res.content.twitter);
            $('.footer_link').attr('href', res.content.linkedin);
            $('.footer_ins').attr('href', res.content.instagram);

            // contact
            $('.footer_number').attr('href', 'callto:' + res.content.number);
            $('.footer_number span').text(res.content.number);
            $('.footer_mail').attr('href', 'mailto:' + res.content.email);
            $('.footer_mail span').text(res.content.email);
            $('.footer_web').attr('href', res.content.web_link);
            $('.footer_web span').text(res.content.web_link);
            $('.footer_address').text(res.content.address);
            // privacy
            $('#privacy').html(res.content.privacy);

            $('.home_content').text(res.content.home);

        },

    });

    // member content
    // Fetch team members
    $.ajax({
        url: 'get-team',
        method: 'GET',
        success: function (memberData) {
            // Loop through each member
            memberData.forEach(function (member) {
                // Create the member HTML block dynamically
                var memberHtml = `
                    <div class="row member_item">
                        <div class="col-lg-6 ">
                            <div class="member_left">
                                <div class="mem_shape_top"></div>
                                <div class="mem_shape_btm"></div>
                                <img src="upload/team/${member.img}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="member_right">
                                <h2>${member.name}</h2>
                                <h3>${member.role}</h3>
                                <h4>Hard Skills</h4>
                                <ul class="skill-list-${member.id}">
                                    <!-- Skills will be appended here -->
                                </ul>
                            </div>
                        </div>
                    </div>
                `;
                // Append the created HTML block to .member_main
                $('.member_main').append(memberHtml);

                // Fetch skills for the current member
                $.ajax({
                    url: 'get-skill',
                    method: 'GET',
                    success: function (skillData) {
                        // Loop through skills and add only matching ones
                        skillData.forEach(function (skill) {
                            if (skill.team_id == member.id) {
                                $(`.skill-list-${member.id}`).append(`<li>${skill.skill}</li>`);
                            }
                        });
                    }
                });
            });
        }
    });

    // service content
    $.ajax({
        url: "/get-services",
        type: "GET",
        success: function (serviceData) {
            serviceData.forEach(function (service) {
                let services = `
                <div class="col-lg-4 col-md-6">
                    <div class="service_item">
                    <div class="service_content">
                        <div class="ser_icon">
                        <i class="${service.icon}"></i>
                        </div>
                        <h4>${service.title}</h4>
                        <p>${service.desp.substring(0, 100)}...</p>
                        <button
                        data-title="${service.title}"
                        data-desp="${service.desp}"
                        data-bs-toggle="modal" data-bs-target="#serviceModal" class="ser_btn">Read more <i class="fa-solid fa-angles-right"></i></button>
                    </div>
                    </div>
                </div>
                `;
                $('.service_row').append(services);
            })
        }
    });
    // service button modal
    $(document).on('click', '.ser_btn', function () {
        let ser_title = $(this).data('title');
        let ser_desp = $(this).data('desp');

        $("#serviceModalHead").text(ser_title);
        $("#serviceModalP").text(ser_desp);
    })

    // counter content
    $.ajax({
        url: "/get-counter",
        type: "GET",
        success: function (counterdata) {
            counterdata.forEach(function (counter, index) {
                let counters = `
                 <div class="col-lg-3 col-md-6 counter_item">
                    <div class="count_content">
                    <h4>${index+1}</h4>
                    <h2><span class="counter">${counter.number}</span>+</h2>
                    <h3>${counter.title}</h3>
                    </div>
                </div>
                `;
                $('.counter_row').append(counters);
            });
            // Reinitialize or trigger the counter after appending the content
            $('.counter').each(function () {
                $(this).counterUp({
                    delay: 10, // You can customize delay and time
                    time: 1000
                });
            });
        }
    });

    // team content
    $.ajax({
        url: "/get-team",
        type: "GET",
        success: function (teamData) {
            // Destroy the slider before appending new elements
            if ($('.team_row').hasClass('slick-initialized')) {
                $('.team_row').slick('unslick');
            }

            // Append team data dynamically
            teamData.forEach(function (team) {
                let teams = `
                  <div class="col-lg-3 team_col">
                        <div class="team_item">
                        <div class="team_img">
                            <img src="upload/team/${team.img}" class="w-100 img-fluid" alt="">
                            <div class="team_overly">
                            <a class="footer_fb" href=""><i class="fa-brands fa-facebook-f"></i></a>
                            <a class="footer_twet" href=""><i class="fa-brands fa-twitter"></i></a>
                            <a class="footer_link" href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            <a class="footer_ins" href=""><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team_content">
                            <h3>${team.name}</h3>
                            <p>${team.role}</p>
                        </div>
                        </div>
                    </div>
                `;
                $('.team_row').append(teams);
            });

            // Reinitialize the slider after appending the new content
            $('.team_row').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                speed: 1000,
                arrows: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                        }
                    }
                ]
            });
        }
    });

    // gallery content
    $.ajax({
        url: "/get-gallery",
        type: "GET",
        success: function (gallerydata) {
            gallerydata.forEach(function (gal) {
                let gallery = `
                <div class="col-lg-4 col-md-6 mix ${gal.class}">
                    <div class="port_col">
                    <img src="upload/gallery/preview/${gal.preview}" class="w-100 img-fluid" alt="p">
                    <div class="port_overly">
                        <a class="my-image-links" data-gall="gallery01" href="upload/gallery/gal/${gal.gallery}"><i
                            class="fa-solid fa-link"></i></a>
                    </div>
                    </div>
                </div>
                `;
                $('.port_mix').append(gallery);
            });
            new VenoBox({
                selector: '.my-image-links', // Re-select your elements with the selector
                numeration: true,
                infinigall: true,
                share: true,
                spinner: 'rotating-plane'
            });
        }
    });

    // client content
    $.ajax({
        url: "/get-client",
        type: "GET",
        success: function (clientData) {
            clientData.forEach(function (client) {
                let clients = `
                 <div class="col-lg-3 col-sm-6 col-md-4 client-info">
                    <div class="client-item text-center mb-5">
                        <img src="upload/client/${client.logo}" alt="clint3" class="img-fluid">
                    </div>
                 </div>
                `;
                $('.client_row').append(clients);
            })
        }
    });

    // blog content 
    $.ajax({
        url: "/get-blog",
        type: "GET",
        success: function (blogData) {
            blogData.forEach(function (blog) {
                let date = new Date(blog.created_at);

                // Format the date as d-m-y
                let day = String(date.getDate()).padStart(2, '0'); // Adds leading zero if needed
                let month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based, so add 1
                let year = date.getFullYear();

                let formattedDate = `${day}-${month}-${year}`; // d-m-y format
                let blogs = `
                  <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                            <img src="upload/blog/${blog.img}" alt="blog2" class="img-fluid w-100">
                            <div class="blog-img-overlay"></div>
                            <div class="blog-img-btn">
                                <a href="/single-blog/${blog.slug}">View Blog</a>
                            </div>
                            </div>
                            <div class="blog-text">
                            <h3>${blog.title.substring(0, 30)}...</h3>
                            <p>${blog.desp.substring(0, 60)}...</p>
                            <i class="fa-solid fa-calendar-days"></i><span>${formattedDate}</span>
                            </div>
                        </div>
                    </div>
                `;
                $('.blog-main').append(blogs);
            })
            // Blog Slider
            $('.blog-main').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                speed: 1000,
                arrows: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                        }
                    }
                ]
            });

        }
    });

    // testimonail
    $.ajax({
        url: "/get-testimonial",
        type: "GET",
        success: function (blogData) {
            blogData.forEach(function (test) {
                let tests = `
                <div class="col-lg-4">
                    <div class="test_col">
                    <div class="test_item">
                        <div class="test_shape_top"></div>
                        <div class="test_shape_bottom"></div>
                        <div class="test_content">
                        <h3>${test.name}</h3>
                        <h4>${test.country}</h4>
                        <div class="test_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        </div>
                        <p>${test.desp}</p>
                        <div class="test_img">
                        <img src="upload/testimonial/${test.image}" class="w-100 img-fluid" alt="">
                        </div>
                    </div>
                    </div>
                </div>
                `;
                $('.test_row').append(tests);
            })
            // team Slider
            $('.test_row').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                speed: 1000,
                arrows: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                        }
                    }
                ]
            });

        }
    });

    // work
    $.ajax({
        url: "/get-portfolio",
        type: "GET",
        success: function(workdata){
            workdata.forEach(function(work){
                let works = `
                 <div class="row work_item">
                    <div class="col-lg-6">
                        <div class="work_left">
                            <img src="upload/portfolio/${work.image}" class="w-100 img-fluid" alt="">
                            <div class="work_info">
                                <div class="work_text">
                                    <h3>${work.title}</h3>
                                    <p>${work.desp} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                `;
                $('.work_main').append(works)
            })
        }
    });
    
    // contact 
    $(document).on('click', '.c_btn', function(){
        let name = $('#c_name').val();
        let email = $('#c_email').val();
        let desp = $('#c_desp').val();

        if(!name){
            toastify().error('Name is required');
        }
        else if(!email){
            toastify().error('Email is required');
        }
        else if(!desp){
            toastify().error('Message is required');
        }
        else{
            $.ajax({
                url: "/create-message",
                type: "POST",
                data: {name:name, email:email, desp:desp},
                success: function(contactData){
                    if(contactData.status==='success'){
                        toastify().success(contactData.message);
                        $("#contactFrom")[0].reset();
                    }
                }
            });
        }
    })

    // event
    $(document).on('click', '#e_submit', function(){
        let time = $('#selectedTime').text();
        let date = $('#selectedDate').text();
        let phone = $('#selectedPhone').text();
        let name = $('#e_name').val();
        let email = $('#e_email').val();
        let desp = $('#e_desp').val();

        
        if(!name){
            toastify().error("Name is required!");
        }
        else if(!email){
            toastify().error("Email is required!");
        }
        else if(!desp){
            toastify().error("Description is required!");
        }
        else{
            $.ajax({
                url: "/create-quote",
                type: "POST",
                data: {time:time,date:date,phone:phone,name:name,email:email,desp:desp},
                success: function(quote){
                    if(quote.status==='success'){
                        toastify().success(quote.message);
                        $('#timeModal').modal('hide');
                        $('#eventFrom')[0].reset();
                    }
                }
            });
        }
    })
});
