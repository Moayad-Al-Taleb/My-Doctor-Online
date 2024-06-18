<?php

namespace App\Providers;

use App\Interfaces\Appointment\AppointmentRepositoryInterface;
use App\Interfaces\Article\ArticleRepositoryInterface;
use App\Interfaces\ArticleFile\ArticleFileRepositoryInterface;
use App\Interfaces\Doctor\DoctorRepositoryInterface;
use App\Interfaces\DoctorImage\DoctorImageRepositoryInterface;
use App\Interfaces\HealthCategory\HealthCategoryRepositoryInterface;
use App\Interfaces\Illness\IllnessRepositoryInterface;
use App\Interfaces\NutritionalFact\NutritionalFactRepositoryInterface;
use App\Interfaces\NutritionalFactFile\NutritionalFactFileRepositoryInterface;
use App\Interfaces\NutritionProgram\NutritionProgramRepositoryInterface;
use App\Interfaces\NutritionProgramMeal\NutritionProgramMealRepositoryInterface;
use App\Interfaces\User\UserRepositoryInterface;
use App\Repository\Appointment\AppointmentRepository;
use App\Repository\Article\ArticleRepository;
use App\Repository\ArticleFile\ArticleFileRepository;
use App\Repository\Doctor\DoctorRepository;
use App\Repository\DoctorImage\DoctorImageRepository;
use App\Repository\HealthCategory\HealthCategoryRepository;
use App\Repository\Illness\IllnessRepository;
use App\Repository\NutritionalFact\NutritionalFactRepository;
use App\Repository\NutritionalFactFile\NutritionalFactFileRepository;
use App\Repository\NutritionProgram\NutritionProgramRepository;
use App\Repository\NutritionProgramMeal\NutritionProgramMealRepository;
use App\Repository\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *s
     * @return void
     */
    public function register()
    {
        $this->app->bind(HealthCategoryRepositoryInterface::class, HealthCategoryRepository::class);
        $this->app->bind(IllnessRepositoryInterface::class, IllnessRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ArticleFileRepositoryInterface::class, ArticleFileRepository::class);
        $this->app->bind(NutritionalFactRepositoryInterface::class, NutritionalFactRepository::class);
        $this->app->bind(NutritionalFactFileRepositoryInterface::class, NutritionalFactFileRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(DoctorImageRepositoryInterface::class, DoctorImageRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
        $this->app->bind(NutritionProgramRepositoryInterface::class, NutritionProgramRepository::class);
        $this->app->bind(NutritionProgramMealRepositoryInterface::class, NutritionProgramMealRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
