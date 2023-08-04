@props(['name' => 'arrow-right'])
<svg {{ $attributes->merge(['class' => 'icon']) }} width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
@switch($name)
@case('layout')<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M9 3v18M9 9h12"/>@break
@case('user')<circle cx="12" cy="8" r="4"/><path d="M4 21v-2a8 8 0 0 1 16 0v2"/>@break
@case('grid')<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>@break
@case('spark')<path d="m12 3 2.5 6.5L21 12l-6.5 2.5L12 21l-2.5-6.5L3 12l6.5-2.5L12 3Z"/>@break
@case('briefcase')<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V3h8v4M3 12l9 3 9-3M12 12v5"/>@break
@case('book')<path d="M12 5v16M12 5C9 2 5 3 2 4v15c4-1 7-1 10 2 3-3 6-3 10-2V4c-3-1-7-2-10 1Z"/>@break
@case('layers')<path d="m12 3 10 5-10 5L2 8l10-5ZM2 12l10 5 10-5M2 16l10 5 10-5"/>@break
@case('globe')<circle cx="12" cy="12" r="9"/><ellipse cx="12" cy="12" rx="4" ry="9"/><path d="M3 12h18"/>@break
@case('heart')<path d="M20.8 4.6a5.4 5.4 0 0 0-7.6 0L12 5.8l-1.2-1.2a5.4 5.4 0 0 0-7.6 7.6L12 21l8.8-8.8a5.4 5.4 0 0 0 0-7.6Z"/>@break
@case('mail')<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 6 9 7 9-7"/>@break
@case('settings')<path d="M4 7h16M4 17h16"/><circle cx="9" cy="7" r="3" fill="var(--surface,white)"/><circle cx="15" cy="17" r="3" fill="var(--surface,white)"/>@break
@case('logout')<path d="M9 21H4V3h5M9 12h12m-4-4 4 4-4 4"/>@break
@case('menu')<path d="M4 6h16M4 12h16M4 18h16"/>@break
@case('arrow-up-right')<path d="M6 18 18 6M6 6h12v12"/>@break
@case('arrow-left')<path d="M20 12H4m6-6-6 6 6 6"/>@break
@case('check')<path d="m5 12 4 4L19 6"/>@break
@case('shield')<path d="m12 3 8 3v6c0 5-8 9-8 9s-8-4-8-9V6l8-3Z"/><path d="m8 12 3 3 5-6"/>@break
@case('plus')<path d="M12 4v16M4 12h16"/>@break
@case('edit')<path d="m15 4 5 5M3 21l5-1L21 7a3.5 3.5 0 0 0-5-5L3 15v6Z"/>@break
@case('trash')<path d="M3 6h18M9 6V3h6v3M5 6l1 15h12l1-15M10 10v7M14 10v7"/>@break
@default<path d="M4 12h16m-6-6 6 6-6 6"/>
@endswitch
</svg>
