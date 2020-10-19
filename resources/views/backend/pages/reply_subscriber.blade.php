<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="abc">Reply</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="{{route('subscriber')}}">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter Your Email"
                           name="email" value="{{$email->email}}" required="required">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" class="form-control" name="subject"
                           value=""
                           placeholder="Your Subject...">
                </div>
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control uk-margin-bottom" rows="8"
                          placeholder="Message..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Reply</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>