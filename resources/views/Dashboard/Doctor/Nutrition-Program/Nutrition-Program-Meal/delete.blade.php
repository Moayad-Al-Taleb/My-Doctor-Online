<div class="modal fade" id="delete{{ $nutritionProgram->id }}{{ $nutritionProgramMeal->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete nutrition program meal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Doctor.NutritionProgramMeals.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="nutrition_program_id" value="{{ $nutritionProgram->id }}">
                    <input type="hidden" name="nutrition_program_meal_id" value="{{ $nutritionProgramMeal->id }}">

                    <h5>Are you sure about the deletion process?</h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
