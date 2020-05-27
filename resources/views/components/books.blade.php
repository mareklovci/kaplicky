@foreach($artefacts as $artefact)
<div class="container books-component">
    <div class="row mt-5">

        <div class="col-md-6 book-area">
            @if (!is_null($artefact))
                <div class="artefact-area">
                    <div class="card">
                        <a href="#imageModal" data-toggle="modal">
                            <img class="card-img-top" src="{{asset('images/artefacts/book_cover_01.jpg')}}" width="100%" height=auto alt="book_cover">
                        </a>
                        <div class="card-cus-bottom">
                            <a class="book-arrow book-arrow-left artefact-link previous-artefact {{$artefacts->onFirstPage() ? "invisible" : "visible"}}" href="{{$artefacts->previousPageUrl()}}"></a>
                            <div class="likes">
                                @if ($artefact->favourite)
                                    <a href="{{  action('ArtefactController@unlike', ['id' => $artefact->id]) }}">
                                        <button id="like_butt_{{$artefact->id}}" type="button" class="btn btn-primary button-image inter_like_filled"></button>
                                    </a>
                                @else
                                    <a href="{{  action('ArtefactController@like', ['id' => $artefact->id]) }}">
                                        <button id="like_butt_{{$artefact->id}}" type="button" class="btn btn-primary button-image inter_like"></button>
                                    </a>
                                @endif
                                <h6 class="artefact-likes">{{$artefact->likes}}</h6>
                            </div>
                            <a class="book-arrow book-arrow-right artefact-link next-artefact {{$artefacts->hasMorePages() ? "visible" : "invisible"}}" href="{{$artefacts->nextPageUrl()}}"></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-6 info-area">
            <div class="artefact-info">
                <h3 class="switch-view"><a onclick="switchView()">notes</a></h3>
                <h3 class="artefact-name">{{$artefact->name}}</h3>
                <h4 class="artefact-author">{{$artefact->author}}</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt, ex id blandit placerat, dolor nibh venenatis dui, nec malesuada odio sem a leo. Nunc vulputate augue neque.
                    Donec pulvinar sollicitudin arcu eget sagittis. Sed auctor, enim vel facilisis sodales, felis tellus rutrum quam, ac feugiat leo mauris ac purus. Nam placerat sed risus ut suscipit.
                    Sed rutrum arcu eget mi fermentum ultrices. Donec egestas volutpat eros, ut tincidunt dolor pulvinar vitae.
                </p>
                <p>
                    Curabitur sem elit, imperdiet ac laoreet vitae, rhoncus quis risus. Suspendisse varius dolor sem, at egestas massa suscipit non.
                    Morbi sit amet dictum metus, sit amet sollicitudin nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mattis leo convallis aliquam scelerisque.
                    Praesent vulputate porttitor quam at egestas. Proin eget orci ligula. Aenean malesuada, eros vitae convallis sagittis, neque leo ullamcorper ante, eu ultricies justo justo in lacus.
                </p>


            </div>

            <div class="artefact-notes">
                <button type="button" class="btn btn-primary button-image inter_info" onclick="switchView()"></button>
                <h3 class="artefact-name">{{$artefact->name}}</h3>
                <h4 class="artefact-author">{{$artefact->author}}</h4>
                @if(count($artefact->metadata) > 0)
                    @foreach($artefact->metadata as $meta)
                        <div  id="row_{{$meta->id}}" class="row text-page">
                            <div class="pin-horizontal">
                                <div class="metadata">
                                    <a href="#meta_{{$meta->id}}" data-toggle="collapse" data-target="#meta_{{$meta->id}}" onclick="openNote('#row_{{$meta->id}}')">
                                        <span>page {{$meta->page}}</span>
                                    </a>
                                    <a href="#meta_{{$meta->id}}" class="arrow-down" data-toggle="collapse" data-target="#meta_{{$meta->id}}" onclick="openNote('#row_{{$meta->id}}')"></a>
                                </div>
                            </div>
                            <div id="meta_{{$meta->id}}" class="metadata-text collapse">
                                <p>
                                    {{$meta->noteEN}}
                                </p>
                                <div class="text-center">
                                    @if ($meta->favourite)
                                        <a href="{{  action('DetailsController@unlike', ['id' => $meta->id]) }}">
                                            <button id="like_butt_{{$meta->id}}" type="button" class="btn btn-primary button-image inter_like_filled"></button>
                                        </a>
                                    @else
                                        <a href="{{  action('DetailsController@like', ['id' => $meta->id]) }}">
                                            <button id="like_butt_{{$meta->id}}" type="button" class="btn btn-primary button-image inter_like"></button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <h2>No favourite metadata yet!</h2>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Image modal -->
<div class="modal image-modal fade" id="imageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-content">
            <img class="card-img-top" src="{{asset('images/artefacts/book_cover_01.jpg')}}" width="100%" height=auto alt="book_cover">
        </div>
    </div>
</div>

<script>
    function switchView()
    {
        let info = $('.artefact-info');
        let notes = $('.artefact-notes');

        if (notes.css('display') === 'none')
        {
            notes.css('display', 'block');
            info.css('display', 'none');

            let parent_width = notes.width();

            $(".metadata").each(function() {
                let metadata = $(this);
                let width = metadata.width();

                metadata.css("margin-left", (parent_width / 2)  - width);
            });
        }
        else
        {
            notes.css('display', 'none');
            info.css('display', 'block');
        }
    }

    function openNote(element)
    {
        let metadata = $(element);
        let showed = metadata.find(".metadata-text").hasClass('show');

        if (showed === false)
        {
            metadata.find('.pin-horizontal').addClass("white-pin");
        }
        else
        {
            metadata.find('.pin-horizontal').removeClass("white-pin");
        }

    }
</script>
