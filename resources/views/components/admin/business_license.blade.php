@php
                            if($license->approval_status == 0 )
                              {
                                $status = 'pending';
                                $message = 'Pending';
                              }elseif($license->approval_status == 1)
                              {
                                $status = 'active';
                                $message = 'Approved';
                              }elseif($license->approval_status == 2)
                              {
                                $status = 'expired';
                                $message = 'Rejected';
                              }
                            @endphp
                        <tr class="{{$status ?? 'active'}}">
                        <td>
                        @if(isset($license->user->employerDetails->institution_logo) && !empty($license->user->employerDetails->institution_logo))
                        <img class="rounded-circle shadow-1-strong"
												src="{{asset($license->user->employerDetails->institution_logo)}}" alt="avatar"
												style="width: 50px;margin-right:7px;" />
                        @else
                        <img src="{{asset('assets/images/avatar_04.jpg')}}" data-src="{{asset('assets/images/avatar_04.jpg')}}" alt="avatar" class ="rounded-circle shadow-1-strong" style="width: 50px;margin-right:7px;">
                        @endif
                        </td>
                            <td>
                                <div class="job-name employer-name" ><a href="{{route('companyAboutUs',\Crypt::encryptString($license->user->id))}}"> {{$license->user->employerDetails->institution ?? ''}}</a></div>
                                <!-- <div class="info1">Fulltime . Spain</div> -->
                            </td>
                            <td >
                                @if(isset($license->license_file) && !empty($license->license_file))
                                <div style = "padding-left:20px;">
                                    <a class="btn btn-primary" href = "{{asset($license->license_file)}}" target = "_blank">File</a>
                                </div>
                                @endif 
                            </td>
                            <td>
                                <div  >{{$license->license_number}}</div>
                            </td>
                            <td>
                                <div class="job-status">{{$message ?? ''}}</div>
                            </td>
                          
                            <td>
                                <div class="action-dots float-end">
                                    <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                            document.getElementById('accept-form-{{$license->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Approve</a>
                                        </li>                                                
                                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                            document.getElementById('reject-form-{{$license->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reject.svg')}}" alt="" class="lazy-img"> Reject</a>
                                        </li>                                                
                                        <form id="accept-form-{{$license->id}}" action="{{ route('owner.employerApproveLicense', $license->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                        <form id="reject-form-{{$license->id}}" action="{{ route('owner.employerRejectLicense', $license->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>