<!--Main js file Style--> 
<script type="text/javascript" src="{{URL::asset("js/app.js")}}"></script> 
{{-- <script type="text/javascript" src="{{URL::asset("src/js/jquery.js")}}"></script>  --}}
{{-- <script type="text/javascript" src="{{URL::asset("src/js/bootstrap.js")}}"></script> --}}
<script type="text/javascript" src="{{URL::asset("src/js/jquery.magnific-popup.js")}}"></script>
<script type="text/javascript" src="{{URL::asset("src/js/owl.carousel.js")}}"></script>
<script type="text/javascript" src="{{URL::asset("src/js/jquery.countTo.js")}}"></script>
<script type="text/javascript" src="{{URL::asset("src/js/jquery.appear.js")}}"></script>
<script type="text/javascript" src="{{URL::asset("src/js/custom.js")}}"></script>
@if(session()->has("verified"))
<script>
    swal("Account Verified", "Thank You!", "success");
</script>
@endif
@if(session()->has("newsletter"))
<script>
    swal('{{ session()->get("newsletter")["title"] }}', '{{ session()->get("newsletter")["message"] }}', "success");
</script>
@endif
<!--Main js file End-->
@yield('scripts')