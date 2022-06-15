<script src="<?=ASSETS;?>js/jquery.min.js"></script>
    <script src="<?=ASSETS;?>js/script.js"></script>
    <script src="<?=ASSETS;?>js/wow.min.js"></script>
    <script src="<?=ASSETS;?>js/bootstrap.min.js"></script>
    <script src="<?=ASSETS;?>js/owl.carousel.js"></script>
    <script type="text/javascript" src="<?=ASSETS;?>js/stellarnav.min.js"></script>

    <!-- <script src="<?=ASSETS;?>plugins/jQuery/jquery.min.js"></script> -->
    <script src="<?=ASSETS;?>plugins/slick/slick.min.js"></script>
    <script src="<?=ASSETS;?>plugins/slick/slick-animation.min.js"></script>
    <!-- <script src="<?=ASSETS;?>plugins/summernote/summernote.js"></script> -->
    <!-- <script src="<?=ASSETS;?>plugins/summernote/summernote-bs4.js"></script>
    <script src="<?=ASSETS;?>plugins/summernote/summernote-lite.js"></script> -->

    <script src="<?=ASSETS;?>plugins/sweet-alert/sweetalert2.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        // banner-carousel
        function bannerCarouselOne() {
            $('.banner-carousel.banner-carousel-1').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                dots: false,
                speed: 600,
                arrows: false,
                prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fa fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fa fa-chevron-right"></i></button>'
            });
            $('.banner-carousel.banner-carousel-1').slickAnimation();
        }
        bannerCarouselOne();


        // banner Carousel Two
        function bannerCarouselTwo() {
            $('.banner-carousel.banner-carousel-2').slick({
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                dots: false,
                speed: 400,
                arrows: false,
                prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fa fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fa fa-chevron-right"></i></button>'
            });
        }
        bannerCarouselTwo();


        // pageSlider
        function pageSlider() {
            $('.page-slider').slick({
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                dots: false,
                speed: 400,
                arrows: true,
                prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>'
            });
        }
        pageSlider();
    </script>
       <script>
        class FileChooser {
            constructor(element, settings) {
                if (typeof element === "string") {
                    element = document.querySelector(element);
                }

                this.settings = FileChooser.getSettings(settings);
                this.originalInput = element;
                this.wrapper = FileChooser.createWrapper();
                this.input = FileChooser.createInput(this.settings.placeholder);
                this.clearButton = FileChooser.createClearButton();

                this.appendElements();
                this.attachListeners();
            }
            setText(text) {
                this.input.value = text;
            }
            reset() {
                this.wrapper.reset();
            }
            open() {
                this.originalInput.click();
            }
            attachListeners() {
                this.wrapper.addEventListener("click", (ev) => {
                    ev.preventDefault();
                    this.open();
                });
                this.wrapper.addEventListener("submit", (ev) => ev.preventDefault());

                this.clearButton.addEventListener("click", (ev) => {
                    ev.stopPropagation();
                    this.reset();
                });

                this.originalInput.addEventListener("click", (ev) => ev.stopPropagation());

                this.originalInput.addEventListener("change", (ev) => {
                    this.setText(ev.target.value);
                });
            }
            appendElements() {
                let parent = this.originalInput.parentNode;

                this.originalInput.classList.add("file-chooser-hidden");
                this.wrapper.appendChild(this.input);
                this.wrapper.appendChild(this.clearButton);
                parent.insertBefore(this.wrapper, this.originalInput);
                this.wrapper.appendChild(this.originalInput);
            }
            static getDefaults() {
                return {
                    buttonText: "Browse",
                    placeholder: "Please choose a file"
                };
            }
            static getSettings(settings) {
                return {
                    ...FileChooser.getDefaults(),
                    ...settings
                };
            }
            static createWrapper() {
                let wrapper = document.createElement("form");
                wrapper.classList.add("file-chooser");
                return wrapper;
            }
            static createInput(placeholder) {
                let input = document.createElement("input");
                input.setAttribute("readonly", true);
                input.setAttribute("placeholder", placeholder);
                input.classList.add("file-chooser-input");
                return input;
            }
            static createClearButton() {
                let clearButton = document.createElement("button");
                clearButton.classList.add("file-chooser-clear");
                return clearButton;
            }
        }

        let fileBorwser = new FileChooser(".file-browser", {});
        let fileBrowser2 = new FileChooser(".file-browser-2", {});

    </script>