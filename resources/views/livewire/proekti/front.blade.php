<div class="container">
	<div class="row justify-content-center">
	    <div class="col-lg-7 text-center">
	        <div class="section-title" data-aos="fade-right" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">
	            <span class="h6 text-color">Проекти</span>
	            <h2 class="mt-3 content-title">
	            	@if($proektiFilter == 'tekovni_aktivnosti')
	            		Тековни активности
	            	@endif
	            	@if($proektiFilter == 'realizirani')
	            		Реализирани
	            	@endif
	            </h2>
	        </div>
	    </div>
	</div>
	<div class="row justify-content-center" data-aos="fade-left" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">
		<div class="w-100 pb-5" style="text-align: center!important;">
			<div class="form-check" style="color: black!important;">
				<input type="radio" class="btn-check" wire:model="proektiFilter" name="proektiFilter" value="tekovni_aktivnosti" id="option51" autocomplete="off">
			    <label class="btn btn-small btn-solid-border btn-round-full @if($proektiFilter == 'tekovni_aktivnosti') btn-selected @endif" for="option51">Тековни активности</label>
			    
			    <input type="radio" class="btn-check" wire:model="proektiFilter" name="proektiFilter" value="realizirani" id="option61" autocomplete="off" checked="">
			    <label class="btn btn-small btn-solid-border btn-round-full @if($proektiFilter == 'realizirani') btn-selected @endif" for="option61">Реализирани</label>
			    
			</div>
		</div>
		@foreach($proekti as $proekt)
		    <div class="col-12 col-md-6 col-lg-4 mb-5">
			    <div class="box-white bg-transparent resources">

			    	<div class="image-box">
	                    <div class="preview" style="background-image: url({{ route('file_storage_serve', ['params' => 'images', 'file' => $proekt->image]) }});"></div>
	                </div>

			        <div class="card-body mt-2">
			            <div class="blog-item-meta">
			                <a href="#" class="">{{ \Carbon\Carbon::createFromFormat('Y-d-m H:i:s', $proekt->created_at)->format('d/m/Y') }}<span class="ml-2">/</span></a>
			                <a href="#"  class="">
			                	@if($proekt->type == 'tekovni_aktivnosti')
								    Тековни активности
								@endif
								@if($proekt->type == 'realizirani')
								    Реализирани
								@endif
			                </a>
			            </div> 

			            <p class="h3 mb-1 mb-sm-1 text text-update">
			            	<a href="#" class=" ">{{ Str::words($proekt->title, 7, '... ') }}</a>
			            </p>
			            <div class="update-center text-left">
			            	<a href="#" class="btn btn-small btn-solid-border btn-round-full">Повеќе</a>
			            </div>
			            
			        </div>
			    </div>
			</div>
		@endforeach
		<div class="w-100" style="text-align: center!important;">{{ $proekti->links() }}</div>
	</div>
</div>
