<div class="container">
	<div class="row justify-content-center">
	    <div class="col-lg-7 text-center">
	        <div class="section-title">
	            <span class="h6 text-color">Новости</span>
	            <h2 class="mt-3 content-title text-white">
	            	@if($novostiFilter == 'opsto')
	            		Општо
	            	@endif
	            	@if($novostiFilter == 'izvestuvanja')
	            		Известувања
	            	@endif
	            	@if($novostiFilter == 'finansiski_uslugi')
	            		Финансиски услуги
	            	@endif
	            </h2>
	        </div>
	    </div>
	</div>
	<div class="row justify-content-center">
		<div class="w-100 pb-5" style="text-align: center!important;">
			<div class="form-check" style="color: white!important;">
				<input type="radio" class="btn-check" wire:model="novostiFilter" name="novostiFilter" value="opsto" id="option5" autocomplete="off" checked="">
			    <label class="btn btn-small btn-solid-border btn-round-full text-white @if($novostiFilter == 'opsto') btn-selected @endif" for="option5">Општо</label>
			    
			    <input type="radio" class="btn-check" wire:model="novostiFilter" name="novostiFilter" value="izvestuvanja" id="option6" autocomplete="off">
			    <label class="btn btn-small btn-solid-border btn-round-full text-white @if($novostiFilter == 'izvestuvanja') btn-selected @endif" for="option6">Известувања</label>
			    
			    <input type="radio" class="btn-check" wire:model="novostiFilter" name="novostiFilter" value="finansiski_uslugi" id="option8" autocomplete="off">
			    <label class="btn btn-small btn-solid-border btn-round-full text-white @if($novostiFilter == 'finansiski_uslugi') btn-selected @endif" for="option8">Финансиски услуги</label>
			</div>
		</div>
		@foreach($novosti as $novost)
		    <div class="col-12 col-md-6 col-lg-4 mb-5">
			    <div class="box-white bg-transparent resources">

			    	<a href="{{ route('statija', ['tip' => 'novosti', 'kategorija' => $novost->type, 'slug' => $novost->slug]) }}">
				    	<div class="image-box">
		                    <div class="preview" style="background-image: url({{ route('file_storage_serve', ['params' => 'images', 'file' => $novost->image]) }});"></div>
		                </div>
		            </a>

			        <div class="card-body mt-2">
			            <div class="blog-item-meta">
			                <a href="#" class="text-white-50">{{ \Carbon\Carbon::createFromFormat('Y-d-m H:i:s', $novost->created_at)->format('d/m/Y') }}<span class="ml-2">/</span></a>
			                <a href="#"  class="text-white-50">
			                	@if($novost->type == 'opsto')
		                            Општо
		                        @endif
		                        @if($novost->type == 'izvestuvanja')
		                            Известувања
		                        @endif
		                        @if($novost->type == 'finansiski_uslugi')
		                            Финансиски услуги
		                        @endif
			                </a>
			            </div> 

			            <p class="h3 mb-1 mb-sm-1 text text-update">
			            	<a href="{{ route('statija', ['tip' => 'novosti', 'kategorija' => $novost->type, 'slug' => $novost->slug]) }}" class="text-white ">{{ Str::words($novost->title, 7, '... ') }}</a>
			            </p>
			            <div class="update-center text-left">
			            	<a href="{{ route('statija', ['tip' => 'novosti', 'kategorija' => $novost->type, 'slug' => $novost->slug]) }}" class="btn btn-small btn-solid-border btn-round-full text-white">Повеќе</a>
			            </div>
			            
			        </div>
			    </div>
			</div>
		@endforeach
		<div class="w-100" style="text-align: center!important;">{{ $novosti->links() }}</div>
	</div>
</div>

