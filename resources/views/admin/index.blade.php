
<!DOCTYPE html>
<html lang="en">
    @include('admin.admins.header')
  <body>
    
    @include('admin.admins.navigation')
    
    @include('admin.admins.panel_main')

    @include('admin.admins.guarantee')
    
    @include('admin.admins.featured_destination')

    {{-- @include('admin.admins.top_tour')

    @include('admin.admins.fun_fact') --}}

    @yield('content')
    {{-- @include('admin.admins.popular')

    @include('admin.admins.question_for_us')

    @include('admin.admins.popular_restaurants')

    @include('admin.admins.tip_and_articles')
		
    @include('admin.admins.subrice_to_our') --}}

    @include('admin.admins.footer')
    
  

    @include('admin.admins.loader')


    @include('admin.admins.js')
    @include('admin.admins.custom_js')
    
  </body>
</html>