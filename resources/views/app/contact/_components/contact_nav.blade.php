 @php

     $repliedActive = request()->has('replied') || (isset($replied) && $replied) ? 'active-message' : '';

     $unreadActive = (isset($status) && $status) || (request()->query('status') || (request()->routeIs('contact.index') && !request()->has('status'))) ? 'active-message' : '';

     $readActive = (isset($status) && !$status && (!isset($replied) || !$replied) ) || (request()->has('status') && !request()->query('status') && !request()->has('replied')) ? 'active-message' : '';

 @endphp
 <nav>
     <ul class="nav">
         <li class="nav-item py-1">
             <a class="nav-link d-flex align-items-center {{ $unreadActive }} px-auto"
                 href="{{ route('contact.index', ['status' => 1]) }}" title="Mensagens não Lidas">
                 <div class="position-relative">
                     <i class="bi-envelope-fill text-warning fs-1 me-2"></i>
                     <span
                         class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $quantityMessages->unread }}</span>
                 </div>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link d-flex align-items-center {{ $readActive }} px-auto"
                 href="{{ route('contact.index', ['status' => 0]) }}" title="Mensagens Lidas">
                 <div class="position-relative">
                     <i class="bi-envelope-paper-fill text-warning fs-2 me-2 position-relative"></i>
                     <span
                         class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $quantityMessages->read }}</span>
                 </div>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link d-flex align-items-center {{ $repliedActive }} px-auto"
                 href="{{ route('contact.index', ['status' => 0, 'replied' => 1]) }}" title="Mensagens Respondidas">
                 <div class="position-relative">
                     <i class="bi-envelope-check-fill text-warning fs-2 me-2 position-relative"></i>
                     <span
                         class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $quantityMessages->replied }}</span>
                 </div>
             </a>
         </li>
     </ul>
 </nav>
