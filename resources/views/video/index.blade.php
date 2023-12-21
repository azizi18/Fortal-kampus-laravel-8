@extends('layout.head')
@section('content')
    <section id="" class="p-5 ">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="mt-5 text-center">Video</h1>
            <div class="row mt-4">
                <?php foreach($videos as $video) { ?>
                <div class="col-md-4 col-sm-4">
                    <div class="video-post">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="{{ $video->video }}?rel=0" allowfullscreen></iframe>
                            </div> 

                    </div>
                </div>
                <?php } ?>

            </div>
            <div class="gt-pagination">
                {{ $videos->links() }}
            </div>

        </div>
        </div>

    </section>
@endsection
