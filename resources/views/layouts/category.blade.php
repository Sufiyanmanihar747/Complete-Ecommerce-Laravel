 <section class="section category">
   <div class="container">
     <div class="container">
       <div class="row category-list">
         @foreach ($categories as $category)
           <div class="col-md-3 category-item">
             <figure class="category-banner">
               <div class="image-overlay"></div>
               <img src="{{ url('storage/images/' . $category->image) }}" alt="Active & outdoor" loading="lazy"
                 width="" height="" class="w-100">
             </figure>
             <a href="#" class="btn font-weight-bold d-flex">{{ $category->name }}</a>
           </div>
         @endforeach

       </div>
     </div>
   </div>
 </section>
