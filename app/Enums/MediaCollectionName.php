<?php

namespace App\Enums;

enum MediaCollectionName: string
{
    // scout enrollment
    case SCOUT_BLANK = 'scout-blank';
    case SCOUT_SIGNED = 'scout-signed';

    // project report
    case PROJECT_REPORT = 'project-report';
    case PROJECT_PICTURE_1 = 'project-picture-1';
    case PROJECT_PICTURE_2 = 'project-picture-2';
    case PROJECT_CONSENTS_1 = 'project-consents-1';
    case PROJECT_CONSENTS_2 = 'project-consents-2';
}
