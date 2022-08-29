@extends('layouts.app')
@section('content')
<div>
  <table border="1">
    <h3>レビュー確認ページ</h3>
    <a href="{{ route('root') }}">ホントのページ</a>
    <thead>
      <tr>
        <th>名前</th>
        <th>タイトル</th>
        <th>本文</th>
      </tr>
    </thead>
    @foreach($reviews as $review)
      <tbody>
        <tr>
          <td>{{ $review->name }}</td>
          <td>{{ $review->title }}</td>
          <td>{{ $review->content }}</td>
        </tr>
      </tbody>
    @endforeach
  </table>
</div>
@endsection