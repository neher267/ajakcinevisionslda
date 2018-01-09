@extends('web.layouts.master')
@section('content')

<div class="contact-section">
    <div class="contact-section-head">
        <h3>Contact us</h3>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29218.081819283096!2d90.38414933181136!3d23.738097964092383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf56a606816f68034!2sDhaka+Trade+Center!5e0!3m2!1sen!2s!4v1488622406243" frameborder="0" style="border:0"></iframe></div>
    <div class="contact-form-bottom">
        <div class="col-md-4 address">
            <address>
                <h5>Address:</h5>
                <p>99, Kazi Nazrul Islam Avenue,</p>
                <p>Dhaka 1215, Bangladesh</p>
                <h5>Phone:</h5>
                <p>+88454541</p>
            </address>
        </div>
        <div class="col-md-4 contact-form">
            <form>
                <div class="contact-form-row">
                    <div>
                        <span>Name</span>
                        <input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = '';
                                }">
                    </div>
                    <div>
                        <span>Email</span>
                        <input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = '';
                                }">
                    </div>
                    <div>
                        <span>Phone</span>
                        <input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = '';
                                }">
                    </div>
                    <input type="submit" value="Submit" />
                    <div class="clearfix"> </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 contact-form-row ccomments">
            <div>
                <span>Enter text</span>
                <textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = '';
                        }"></textarea>
            </div>
            <div>
                <span>Security</span>
                <img src="{{asset('public/web_resource/images/security.jpg')}}" class="code" alt="" />
                <input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = '';
                        }">
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection 
