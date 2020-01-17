@extends('template.template')
@section('content')
        <div class="container">
            <div class="row">
            @for($i=0;$i<=5;$i++)
                <div class="col-md-6 blocks">
                    <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean condimentum sapien felis, a facilisis justo pellentesque sed. Vestibulum vel rhoncus sapien. Maecenas rhoncus lacus et nunc efficitur, et rhoncus ante vestibulum. Ut dictum condimentum elit at condimentum. Ut tristique diam eget eleifend fringilla. Maecenas et dui ut justo iaculis gravida ut eu mauris. Integer consequat, dolor sit amet laoreet scelerisque, turpis lectus venenatis massa, auctor rutrum nunc magna nec libero. Duis et felis vel lacus aliquet tincidunt non at nisi. Vestibulum sit amet neque tortor. Mauris id nunc non sem venenatis rhoncus et sit amet purus.
                    Sed consectetur augue et interdum vulputate. Etiam posuere mi sed neque rhoncus, a mollis mauris consectetur. Cras placerat ipsum at neque molestie faucibus. Phasellus sed eleifend mauris, non vehicula nisi. Vestibulum maximus mollis venenatis. Praesent mollis euismod purus a blandit. Sed at neque vitae arcu fermentum rhoncus. Phasellus venenatis tincidunt dictum. Aliquam ac tellus sagittis, dapibus libero non, placerat justo.
                    Cras est nisl, vestibulum eu turpis non, sodales commodo quam. Phasellus imperdiet turpis metus, quis malesuada ex luctus ac. Quisque nec volutpat erat. Quisque venenatis nisi eu arcu vestibulum varius. Sed eros diam, imperdiet a varius ut, aliquet varius ex. Curabitur et dictum mi. Integer mi felis, scelerisque non pellentesque ullamcorper, pharetra sed elit. Fusce ut pharetra elit. Suspendisse potenti. Nunc ac aliquet sapien. Proin in aliquam ligula, quis pellentesque ex. Sed ornare, tellus a congue congue, leo quam rhoncus ex, vitae imperdiet lacus arcu sed nisi. Suspendisse euismod dictum risus, eleifend fermentum felis luctus eu.
                    </span>
                </div>
            @endfor
            </div>
        </div>
@endsection
