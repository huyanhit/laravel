<div class="container">
{{ Form::open(array('url' => 'foo/bar')) }}

  echo Form::text('tieu de');
  echo Form::file($name, $attributes = array());
  echo Form::select('animal', array(
    'Cats' => array('leopard' => 'Leopard'),
    'Dogs' => array('spaniel' => 'Spaniel'),
  ));
  echo Form::text('mo ta');
  echo Form::text('noi dung');
  echo Form::text('nguon');
  
  echo Form::submit('Click Me!');
{{ Form::close() }}
</div>