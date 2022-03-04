<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use Tests\Components\ComponentTestCase;

class ChangeTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function a_change_chart_component_with_no_previous_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_no_previous_and_icon_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                        </dd>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_no_previous_icon_and_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                            <div class="bg-gray-50 absolute bottom-0 inset-x-0 px-4 py-4 sm:px-6">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-sm font-medium text-brand hover:text-brand-lighter">Link</a>
                            </div>
                        </dd>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_numerical_increase_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                            </svg>
                            <span class="sr-only">Increased by</span> 50,000
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_numerical_increase_and_icon_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                            <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                                    </svg>
                                    <span class="sr-only">Increased by</span> 50,000
                                </p>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_numerical_increase_icon_and_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                            <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                                    </svg>
                                    <span class="sr-only">Increased by</span> 50,000
                                </p>
                                <div class="bg-gray-50 absolute bottom-0 inset-x-0 px-4 py-4 sm:px-6">
                                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-sm font-medium text-brand hover:text-brand-lighter">Link</a>
                                </div>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_percentage_increase_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    percent-difference="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                            </svg>
                            <span class="sr-only">Increased by</span> 100%
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_percentage_increase_and_icon_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
                    percent-difference="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                            <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                                    </svg>
                                    <span class="sr-only">Increased by</span> 100%
                                </p>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_percentage_increase_icon_and_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
                    percent-difference="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                            <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                                    </svg>
                                    <span class="sr-only">Increased by</span> 100%
                                </p>
                                <div class="bg-gray-50 absolute bottom-0 inset-x-0 px-4 py-4 sm:px-6">
                                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-sm font-medium text-brand hover:text-brand-lighter">Link</a>
                                </div>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_numerical_decrease_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 50,000 </p>
                    <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                            </svg>
                            <span class="sr-only">Decreased by</span> 50,000
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_numerical_decrease_and_icon_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 50,000 </p>
                            <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                                    </svg>
                                    <span class="sr-only">Decreased by</span> 50,000
                                </p>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_numerical_decrease_icon_and_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 50,000 </p>
                            <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                                    </svg>
                                    <span class="sr-only">Decreased by</span> 50,000
                                </p>
                                <div class="bg-gray-50 absolute bottom-0 inset-x-0 px-4 py-4 sm:px-6">
                                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-sm font-medium text-brand hover:text-brand-lighter">Link</a>
                                </div>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_percentage_decrease_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
                    percent-difference="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 50,000 </p>
                    <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                            </svg>
                            <span class="sr-only">Decreased by</span> 50%
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_percentage_decrease_and_icon_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
                    percent-difference="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 50,000 </p>
                            <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                                    </svg>
                                    <span class="sr-only">Decreased by</span> 50%
                                </p>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_percentage_decrease_icon_and_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
                    icon="icon-users"
                    icon-size="h-8 w-8"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
                    percent-difference="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 50,000 </p>
                            <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                                <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                                    </svg>
                                    <span class="sr-only">Decreased by</span> 50%
                                </p>
                                <div class="bg-gray-50 absolute bottom-0 inset-x-0 px-4 py-4 sm:px-6">
                                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-sm font-medium text-brand hover:text-brand-lighter">Link</a>
                                </div>
                            </dd>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_percentage_decrease_image_and_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
                    image="https://cdn.label-worx.com/media/covers/31-854538_1000.jpg"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
                    percent-difference="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="absolute rounded-md">
                        <img src="https://cdn.label-worx.com/media/covers/31-854538_1000.jpg" alt="Image" class="h-12 w-12 rounded-md">
                    </div>
                    <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                </dt>
                <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 50,000 </p>
                    <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                            </svg>
                            <span class="sr-only">Decreased by</span> 50%
                        </p>
                        <div class="bg-gray-50 absolute bottom-0 inset-x-0 px-4 py-4 sm:px-6">
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-sm font-medium text-brand hover:text-brand-lighter">Link</a>
                        </div>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_icon_attribute_set_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    icon="icon-users"
                    icon-size="h-32 w-32"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                        </dd>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_change_chart_component_with_percent_decimal_number_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="30984"
                    percent-difference="true"
                    decimals="2"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                            </svg>
                            <span class="sr-only">Increased by</span> 222.75%
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_increase_icon_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="50000"
                    increase-icon="icon-users"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                                <span class="sr-only">Increased by</span> 50,000
                            </p>
                        </dd>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_decrease_icon_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="150000"
                    decrease-icon="icon-cog"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M22 14v-4h-2.264c-.232-.901-.611-1.743-1.122-2.493l1.518-1.518-2.121-2.121-1.518 1.518c-.749-.511-1.592-.888-2.493-1.123V2h-4v2.263c-.901.235-1.744.612-2.493 1.122L5.989 3.868 3.868 5.989l1.518 1.518c-.511.749-.89 1.591-1.122 2.493H2v4h2.264c.232.903.611 1.744 1.122 2.493l-1.518 1.518 2.121 2.122 1.518-1.518c.749.51 1.592.888 2.493 1.122V22h4v-2.263c.901-.233 1.744-.612 2.493-1.122l1.518 1.518 2.121-2.122-1.518-1.518c.511-.749.89-1.59 1.122-2.493H22zm-10 4c-3.309 0-6-2.69-6-6 0-3.309 2.691-6 6-6s6 2.691 6 6-2.691 6-6 6z" />
                            </svg>
                            <span class="sr-only">Decreased by</span> 50,000
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_wrapper_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    wrapper-background="1"
                    wrapper-border="2"
                    wrapper-color="3"
                    wrapper-font="4"
                    wrapper-other="5"
                    wrapper-padding="6"
                    wrapper-rounded="7"
                    wrapper-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_title_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    title-background="1"
                    title-border="2"
                    title-color="3"
                    title-font="4"
                    title-other="5"
                    title-padding="6"
                    title-rounded="7"
                    title-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="1 2 3 4 5 6 7 8">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_image_container_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    image="http://www.fillmurray.com/200/200"
                    image-container-background="1"
                    image-container-border="2"
                    image-container-color="3"
                    image-container-font="4"
                    image-container-other="5"
                    image-container-padding="6"
                    image-container-rounded="7"
                    image-container-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="1 2 3 4 5 6 7 8">
                        <img src="http://www.fillmurray.com/200/200" alt="Image" class="h-12 w-12 rounded-md">
                    </div>
                    <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                </dt>
                <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_image_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    image="http://www.fillmurray.com/200/200"
                    image-background="1"
                    image-border="2"
                    image-color="3"
                    image-font="4"
                    image-other="5"
                    image-padding="6"
                    image-rounded="7"
                    image-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="absolute rounded-md">
                        <img src="http://www.fillmurray.com/200/200" alt="Image" class="1 2 3 4 5 6 7 8">
                    </div>
                    <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                </dt>
                <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_icon_container_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    icon="icon-users"
                    icon-container-background="1"
                    icon-container-border="2"
                    icon-container-color="3"
                    icon-container-font="4"
                    icon-container-other="5"
                    icon-container-padding="6"
                    icon-container-rounded="7"
                    icon-container-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="1 2 3 4 5 6 7 8">
                        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                        </dd>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_icon_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    icon="icon-users"
                    icon-background="1"
                    icon-border="2"
                    icon-color="3"
                    icon-font="4"
                    icon-other="5"
                    icon-padding="6"
                    icon-rounded="7"
                    icon-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <div class="text-black absolute p-3 rounded-md">
                        <svg class="1 2 3 4 5 6 7 8 fill-current" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                                <g>
                                    <path d="M20 16.313v-1c0-1.517-1.233-2.75-2.75-2.75h-.778c.18.595.278 1.223.278 1.875v1.875H20zM6.625 7.438c0 1.129.684 2.099 1.659 2.522C5.904 10.075 4 12.031 4 14.438v1.875h10.75v-1.875c0-2.407-1.904-4.362-4.284-4.478.976-.424 1.659-1.394 1.659-2.522 0-1.515-1.233-2.75-2.75-2.75s-2.75 1.234-2.75 2.75zm6.122 6.875H6.003c.065-1.32 1.161-2.375 2.497-2.375h1.75c1.336 0 2.432 1.054 2.497 2.375zm-2.622-6.875c0 .414-.336.75-.75.75s-.75-.336-.75-.75c0-.413.336-.75.75-.75s.75.336.75.75zM7.518 3.058l-.899-1.787c-.658.332-1.289.727-1.877 1.172l1.211 1.592c.489-.372 1.016-.701 1.565-.977zM11.045 2.046L10.857.054c-.736.07-1.468.208-2.176.411l.553 1.922c.588-.168 1.198-.284 1.811-.341zM22.18 5.643c-.391-.624-.842-1.216-1.342-1.759l-1.473 1.354c.417.453.793.947 1.119 1.467l1.696-1.062zM21.824 10.122l1.965-.374c-.139-.726-.345-1.441-.613-2.126l-1.863.729c.224.571.396 1.167.511 1.771zM19.199 2.398c-.591-.443-1.225-.834-1.886-1.161l-.887 1.793c.55.272 1.079.597 1.571.967l1.202-1.599zM15.245.445c-.709-.199-1.441-.333-2.177-.397l-.175 1.992c.612.054 1.223.166 1.813.331l.539-1.926zM3.145 20.099c.498.545 1.049 1.045 1.637 1.488l1.204-1.596c-.49-.37-.95-.789-1.366-1.243l-1.475 1.351zM18.031 19.978l1.207 1.595c.586-.445 1.137-.946 1.634-1.491l-1.479-1.348c-.414.455-.872.873-1.362 1.244zM4.592 5.283l-1.48-1.344c-.495.546-.943 1.141-1.33 1.768l1.701 1.051c.324-.524.697-1.02 1.109-1.475zM14.746 21.619l.548 1.923c.709-.202 1.403-.472 2.063-.802l-.893-1.789c-.55.275-1.128.5-1.718.668zM22 12c0 .619-.057 1.236-.168 1.838l1.967.364c.133-.72.201-1.462.201-2.202v-.046L22 12zM20.506 17.261l1.7 1.054c.389-.627.721-1.293.987-1.981l-1.864-.724c-.222.574-.499 1.128-.823 1.651zM11.087 21.959l-.18 1.992c.361.032.725.049 1.093.049.377 0 .75-.017 1.118-.051l-.185-1.993c-.607.058-1.238.059-1.846.003zM2.664 8.41L.797 7.69c-.265.688-.467 1.405-.6 2.133l1.967.36c.111-.605.279-1.203.5-1.773zM2 12.021l-2 .005c.002.74.071 1.481.207 2.202l1.965-.369c-.113-.602-.17-1.22-.172-1.838zM2.679 15.63l-1.863.727c.267.686.601 1.352.991 1.979l1.697-1.057c-.324-.523-.603-1.077-.825-1.649zM6.664 22.751c.66.328 1.355.597 2.066.798l.544-1.925c-.592-.167-1.171-.39-1.72-.664l-.89 1.791zM13.543 8.844c1.138.672 2.051 1.678 2.607 2.884.93-.251 1.618-1.093 1.618-2.103 0-1.208-.979-2.188-2.188-2.188-.932.001-1.721.586-2.037 1.407z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-500 truncate ml-16">Chart Title</p>
                        </dt>
                        <dd class="flex items-baseline ml-16 pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                        </dd>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_change_chart_component_with_container_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    container-background="1"
                    container-border="2"
                    container-color="3"
                    container-font="4"
                    container-other="5"
                    container-padding="6"
                    container-rounded="7"
                    container-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="1 2 3 4 5 6 7 8">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_increase_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="50000"
                    difference-background="1"
                    difference-border="2"
                    difference-font="3"
                    difference-other="4"
                    difference-padding="5"
                    difference-rounded="6"
                    difference-shadow="7"
                    increase-color="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="1 2 8 3 4 5 6 7">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                            </svg>
                            <span class="sr-only">Increased by</span> 50,000
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_decrease_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="500000"
                    difference-background="1"
                    difference-border="2"
                    difference-font="3"
                    difference-other="4"
                    difference-padding="5"
                    difference-rounded="6"
                    difference-shadow="7"
                    decrease-color="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="1 2 8 3 4 5 6 7">
                        <svg class="w-5 h-5 fill-current self-center shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                            </svg>
                            <span class="sr-only">Decreased by</span> 400,000
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_link_container_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    link="https://www.google.com"
                    link-text="Google"
                    link-container-background="1"
                    link-container-border="2"
                    link-container-color="3"
                    link-container-font="4"
                    link-container-other="5"
                    link-container-padding="6"
                    link-container-rounded="7"
                    link-container-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <div class="1 2 3 4 5 6 7 8">
                        <a href="https://www.google.com" class="text-sm font-medium text-brand hover:text-brand-lighter">Google</a>
                    </div>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_link_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    link="https://www.google.com"
                    link-text="Google"
                    link-background="1"
                    link-border="2"
                    link-color="3"
                    link-font="4"
                    link-other="5"
                    link-padding="6"
                    link-rounded="7"
                    link-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pb-12 pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <div class="bg-gray-50 absolute bottom-0 inset-x-0 px-4 py-4 sm:px-6">
                        <a href="https://www.google.com" class="1 2 3 4 5 6 7 8">Google</a>
                    </div>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_change_chart_component_with_number_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    number-background="1"
                    number-border="2"
                    number-color="3"
                    number-font="4"
                    number-other="5"
                    number-padding="6"
                    number-rounded="7"
                    number-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="1 2 3 4 5 6 7 8"> 100,000 </p>
                </dd>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_decreased_icon_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="200000"
                    difference-icon-background="1"
                    difference-icon-border="2"
                    difference-icon-color="3"
                    difference-icon-font="4"
                    difference-icon-other="5"
                    difference-icon-padding="6"
                    difference-icon-rounded="7"
                    difference-icon-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="text-red-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current 1 2 3 4 5 6 7 8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 15.293l-2.293 2.293V2h-2v15.586l-2.293-2.293L7 16.707l4.707 4.707 4.707-4.707L15 15.293z"/>
                            </svg>
                            <span class="sr-only">Decreased by</span> 100,000
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_change_chart_component_with_increased_icon_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="20000"
                    difference-icon-background="1"
                    difference-icon-border="2"
                    difference-icon-color="3"
                    difference-icon-font="4"
                    difference-icon-other="5"
                    difference-icon-padding="6"
                    difference-icon-rounded="7"
                    difference-icon-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="bg-white relative overflow-hidden pt-5 px-4 sm:pt-6 sm:px-6 rounded-lg shadow">
                <dt>
                    <p class="text-sm font-medium text-gray-500 truncate">Chart Title</p>
                </dt>
                <dd class="flex items-baseline pb-6 sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900"> 100,000 </p>
                    <p class="text-green-600 text-sm font-semibold flex items-baseline ml-2">
                        <svg class="w-5 h-5 fill-current 1 2 3 4 5 6 7 8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.414 6.70712l-4.707-4.707L7 6.70712l1.414 1.414 2.293-2.293V21.4141h2V5.82812L15 8.12112l1.414-1.414z"/>
                            </svg>
                            <span class="sr-only">Increased by</span> 80,000
                        </p>
                    </dd>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
