
</div>



<script src="{{url('shop/js/jquery-1.11.0.min.js')}}"></script>

<script src="{{url('shop/js/bootstrap.min.js')}}"></script>
<script src="{{url('shop/js/jquery.cookie.js')}}"></script>
<script src="{{url('shop/js/waypoints.min.js')}}"></script>
<script src="{{url('shop/js/modernizr.js')}}"></script>
<script src="{{url('shop/js/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{url('shop/js/owl.carousel.min.js')}}"></script>
<script src="{{url('shop/js/front.js')}}"></script>
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#ckeditor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stack('js')
 </body>

</html>
