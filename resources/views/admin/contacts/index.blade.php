@extends('admin_layout')
@section('admin_content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liên hệ</h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Chủ đề</th>
                        <th>Đã liên hệ</th>
                        <th>Tin nhắn</th>
                        <th>Phản hồi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->contacted ? 'Có' : 'Không' }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            @if (!$contact->contacted)
                                <!-- Nút phản hồi -->
                                <button class="btn btn-primary" data-toggle="modal" data-target="#replyModal{{ $contact->id }}">Phản hồi</button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel{{ $contact->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="replyModalLabel{{ $contact->id }}">Phản hồi {{ $contact->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="reply_message">Tin nhắn</label>
                                                        <textarea name="reply_message" class="form-control" rows="5" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <span>Đã liên hệ</span>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
