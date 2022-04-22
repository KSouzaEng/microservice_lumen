<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use App\Traits\ApiResponser;

class BookController extends Controller
{
    use ApiResponser;

    public function index()
   {
      $Books = Book::all();

      return $this->successResponse($Books);
   }
   public function store(Request $request)
   {
      $rules = [
         'title' => 'required|max:255',
         'description' => 'required|max:255',
         'price' => 'required|min:1',
         'author_id' => 'required|min:1'
      ];
      $this->validate($request,$rules);

      $Book = Book::create($request->all());

      return $this->successResponse($Book,Response::HTTP_CREATED);
   }
   public function show($book)
   {
        $book = Book::findOrFail($book);

        return $this->successResponse($book);

   }
   public function update(Request $request,$book)
   {
    $rules = [
        'title' => 'max:255',
        'description' => 'max:255',
        'price' => 'min:1',
        'author_id' => 'min:1'
     ];
     $this->validate($request,$rules);

     $book = Book::findOrFail($book);

      $book->fill($request->all());

      if($book->isClean()){
          return $this->errorResponse('At leat one value must change',Response::HTTP_UNPROCESSABLE_ENTITY);
      }
      $book->save();

      return $this->successResponse($book);
   }
   public function delete($book)
   {

     $book = Book::findOrFail($book);

     $book->delete();

     return $this->successResponse($book);
   }
}
