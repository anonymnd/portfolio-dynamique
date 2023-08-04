<?php

return ['sections' => [
    'aboutme' => ['label' => 'About you', 'table' => 'aboutmes', 'route' => 'aboutme', 'icon' => 'user', 'description' => 'Introduce the person behind the work.', 'title' => 'full_name', 'fields' => [
        'image' => ['label' => 'Portrait', 'type' => 'file', 'help' => 'JPG, PNG, or WebP, up to 5 MB.'],
        'full_name' => ['label' => 'Full name', 'placeholder' => 'The name you want people to know'],
        'job' => ['label' => 'What you do', 'placeholder' => 'e.g. Product designer & developer'],
        'description' => ['label' => 'Your introduction', 'type' => 'textarea', 'placeholder' => 'What drives you? What do you bring to the table?'],
        'birthday' => ['label' => 'Date of birth', 'placeholder' => 'YYYY-MM-DD', 'help' => 'Saved privately; not shown on your portfolio.'],
        'city' => ['label' => 'Based in', 'placeholder' => 'e.g. Casablanca, Morocco'],
    ]],
    'projects' => ['label' => 'Projects', 'table' => 'projects', 'route' => 'projects', 'icon' => 'grid', 'description' => 'Show the work you are proud of.', 'title' => 'title', 'fields' => [
        'title' => ['label' => 'Project name', 'placeholder' => 'Give your project a name'],
        'sub_title' => ['label' => 'Short summary', 'placeholder' => 'A sentence about what you made'],
        'description' => ['label' => 'The story', 'type' => 'textarea', 'placeholder' => 'The challenge, your approach, and the result.'],
        'client' => ['label' => 'Client or collaboration', 'placeholder' => 'e.g. Personal project'],
        'category' => ['label' => 'Category', 'placeholder' => 'e.g. Design, development, photography'],
        'big_image' => ['label' => 'Project image', 'type' => 'file', 'help' => 'Shown in the details. JPG, PNG, or WebP, up to 5 MB.'],
        'small_image' => ['label' => 'Cover image', 'type' => 'file', 'help' => 'Shown in the grid. JPG, PNG, or WebP, up to 5 MB.'],
    ]],
    'skills' => ['label' => 'Skills', 'table' => 'skills', 'route' => 'skills', 'icon' => 'spark', 'description' => 'Make your strengths easy to see.', 'title' => 'name', 'fields' => [
        'name' => ['label' => 'Skill', 'placeholder' => 'e.g. Laravel, art direction, research'],
        'level' => ['label' => 'Proficiency', 'placeholder' => 'e.g. Advanced or 85%'],
    ]],
    'experience' => ['label' => 'Experience', 'table' => 'experiences', 'route' => 'experience', 'icon' => 'briefcase', 'description' => 'Tell the story of your professional journey.', 'title' => 'title', 'fields' => [
        'title' => ['label' => 'Role', 'placeholder' => 'e.g. Senior designer'],
        'place' => ['label' => 'Company or organization', 'placeholder' => 'Where you worked'],
        'date' => ['label' => 'Time period', 'placeholder' => 'e.g. 2022 — Present'],
        'description' => ['label' => 'What you did', 'type' => 'textarea', 'placeholder' => 'Your responsibilities and achievements'],
    ]],
    'education' => ['label' => 'Education', 'table' => 'education', 'route' => 'education', 'icon' => 'book', 'description' => 'Qualifications, courses, and things you have learned.', 'title' => 'title', 'fields' => [
        'title' => ['label' => 'Qualification or course', 'placeholder' => 'e.g. BSc Computer Science'],
        'place' => ['label' => 'School or institution', 'placeholder' => 'Where you studied'],
        'date' => ['label' => 'Time period', 'placeholder' => 'e.g. 2018 — 2022'],
        'description' => ['label' => 'Details', 'type' => 'textarea', 'placeholder' => 'What you learned or achieved'],
    ]],
    'services' => ['label' => 'Services', 'table' => 'services', 'route' => 'services', 'icon' => 'layers', 'description' => 'Let people know how you can help.', 'title' => 'title', 'fields' => [
        'title' => ['label' => 'Service', 'placeholder' => 'e.g. Web design & development'],
        'description' => ['label' => 'What is included', 'type' => 'textarea', 'placeholder' => 'Describe the value you offer'],
        'icon' => ['type' => 'hidden', 'default' => 'fas fa-code'],
    ]],
    'languages' => ['label' => 'Languages', 'table' => 'languages', 'route' => 'languages', 'icon' => 'globe', 'description' => 'Connect with people in their language.', 'title' => 'language_name', 'fields' => [
        'language_name' => ['label' => 'Language', 'placeholder' => 'e.g. English'],
        'level' => ['label' => 'Proficiency', 'placeholder' => 'e.g. Native, fluent, B2'],
    ]],
    'hobbies' => ['label' => 'Interests', 'table' => 'hobbies', 'route' => 'hobbies', 'icon' => 'heart', 'description' => 'The little things that make you, you.', 'title' => 'name', 'fields' => [
        'name' => ['label' => 'Interest', 'placeholder' => 'e.g. Photography, hiking, music'],
        'icon' => ['type' => 'hidden', 'default' => 'fas fa-heart'],
    ]],
    'contact' => ['label' => 'Contact links', 'table' => 'contacts', 'route' => 'contacts', 'icon' => 'mail', 'description' => 'Give people a way to start a conversation.', 'title' => 'name', 'fields' => [
        'name' => ['label' => 'Link label', 'placeholder' => 'e.g. Email, LinkedIn, GitHub'],
        'lien' => ['label' => 'Address or link', 'placeholder' => 'https://… or mailto:you@example.com', 'help' => 'Use a web address, mailto: for email, or tel: for phone.'],
        'icon' => ['type' => 'hidden', 'default' => 'fas fa-envelope'],
    ]],
]];
