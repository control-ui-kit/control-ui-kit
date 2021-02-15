<?php

declare(strict_types=1);

namespace ControlUIKit;

class GrayColors
{
    protected array $grays = ['blue', 'cool', 'classic', 'true', 'warm'];

    public function getScale($gray = 'classic'): string
    {
        if (! $gray || ! in_array($gray, $this->grays, true)) {
            return '';
        }

        if ($gray === 'blue') {
            return $this->blueGray();
        }

        if ($gray === 'cool') {
            return $this->coolGray();
        }

        if ($gray === 'classic') {
            return $this->classicGray();
        }

        if ($gray === 'true') {
            return $this->trueGray();
        }

        if ($gray === 'warm') {
            return $this->warmGray();
        }
    }

    public function blueGray(): string
    {
        return <<< SASS
\$gray-50: #F8FAFC;
\$gray-100: #F1F5F9;
\$gray-150: #EAEFF5;
\$gray-200: #E2E8F0;
\$gray-250: #D7DFE9;
\$gray-300: #CBD5E1;
\$gray-350: #B0BCCD;
\$gray-400: #94A3B8;
\$gray-450: #7C8CA2;
\$gray-500: #64748B;
\$gray-550: #56657A;
\$gray-600: #475569;
\$gray-650: #3D4B5F;
\$gray-700: #334155;
\$gray-750: #293548;
\$gray-800: #1E293B;
\$gray-850: #172033;
\$gray-900: #0F172A;
\$gray-950: #0A0F1C;
\$gray-1000: #05080E;
SASS;
    }

    public function classicGray(): string
    {
        return <<< SASS
\$gray-50: #FAFAFA;
\$gray-100: #F4F4F5;
\$gray-150: #ECECEE;
\$gray-200: #E4E4E7;
\$gray-250: #DCDCE0;
\$gray-300: #D4D4D8;
\$gray-350: #BBBBC1;
\$gray-400: #A1A1AA;
\$gray-450: #898992;
\$gray-500: #71717A;
\$gray-550: #62626B;
\$gray-600: #52525B;
\$gray-650: #494951;
\$gray-700: #3F3F46;
\$gray-750: #333338;
\$gray-800: #27272A;
\$gray-850: #202023;
\$gray-900: #18181B;
\$gray-950: #101012;
\$gray-1000: #080809;
SASS;
    }

    public function coolGray(): string
    {
        return <<< SASS
\$gray-50: #F9FAFB;
\$gray-100: #F3F4F6;
\$gray-150: #ECEEF1;
\$gray-200: #E5E7EB;
\$gray-250: #DBDEE3;
\$gray-300: #D1D5DB;
\$gray-350: #B7BCC5;
\$gray-400: #9CA3AF;
\$gray-450: #848B98;
\$gray-500: #6B7280;
\$gray-550: #5B6472;
\$gray-600: #4B5563;
\$gray-650: #414B5A;
\$gray-700: #374151;
\$gray-750: #2B3544;
\$gray-800: #1F2937;
\$gray-850: #18212F;
\$gray-900: #111827;
\$gray-950: #0B101A;
\$gray-1000: #06080D;
SASS;
    }

    public function trueGray(): string
    {
        return <<< SASS
\$gray-50: #FAFAFA;
\$gray-100: #F5F5F5;
\$gray-150: #EDEDED;
\$gray-200: #E5E5E5;
\$gray-250: #DDDDDD;
\$gray-300: #D4D4D4;
\$gray-350: #BCBCBC;
\$gray-400: #A3A3A3;
\$gray-450: #8B8B8B;
\$gray-500: #737373;
\$gray-550: #636363;
\$gray-600: #525252;
\$gray-650: #494949;
\$gray-700: #404040;
\$gray-750: #333333;
\$gray-800: #262626;
\$gray-850: #1F1F1F;
\$gray-900: #171717;
\$gray-950: #0F0F0F;
\$gray-1000: #080808;
SASS;
    }

    public function warmGray(): string
    {
        return <<< SASS
\$gray-50: #FAFAF9;
\$gray-100: #F5F5F4;
\$gray-150: #EEEDEC;
\$gray-200: #E7E5E4;
\$gray-250: #DFDCDB;
\$gray-300: #D6D3D1;
\$gray-350: #BFBBB8;
\$gray-400: #A8A29E;
\$gray-450: #908A85;
\$gray-500: #78716C;
\$gray-550: #68625D;
\$gray-600: #57534E;
\$gray-650: #4E4A45;
\$gray-700: #44403C;
\$gray-750: #373330;
\$gray-800: #292524;
\$gray-850: #231F1E;
\$gray-900: #1C1917;
\$gray-950: #13110F;
\$gray-1000: #090808;
SASS;
    }
}
