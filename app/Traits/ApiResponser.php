<?php   

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use spatie\Fractalistic\ArraySerializer;
use Spatie\Fractalistic\Fractal;

trait ApiResponser {

    private function successResponse($data, $code) {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code) {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200) {
        if($collection->isEmpty()) {

            return $this->successResponse(['data' => $collection], $code);
        }

        
        $transformer = $collection->first()->transformer;

        // Verifica se o transformador está definido antes de continuar
    if (!$transformer) {
        throw new \Exception("No transformer specified.");
    }
    
        $collection = $this->transformData($collection, $transformer);
    
        return $this->successResponse(['data' => $collection], $code);
    }

    protected function showOne(Model $instance, $code = 200) {
        $transformer = $instance->transformer;

        // Verifica se o transformador está definido antes de continuar
    if (!$transformer) {
        throw new \Exception("No transformer specified.");
    }

        $instance = $this->transformData($instance, $transformer);
        return $this->successResponse($instance, $code);
    }

    protected function showMessage($message, $code = 200) {
        return $this->successResponse(['data' => $message], $code);
    }

    protected function transformData($data, $transformer) {
        $transformation = fractal($data, new $transformer);

        return $transformation->toArray();
    }

}