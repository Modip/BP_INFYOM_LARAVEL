<li class="{{ Request::is('clientphysiques*') ? 'active' : '' }}">
    <a href="{{ route('clientphysiques.index') }}"><i class="fa fa-edit"></i><span>Clientphysiques</span></a>
</li>

<li class="{{ Request::is('compteCltphysiques*') ? 'active' : '' }}">
    <a href="{{ route('compteCltphysiques.index') }}"><i class="fa fa-edit"></i><span>Compte Cltphysiques</span></a>
</li>

