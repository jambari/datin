<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;
use App\Models\Article;
use App\Models\Gallery;
class ArticleCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Article");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article');
        $this->crud->setEntityNameStrings('article', 'articles');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                            ]);
        $this->crud->addColumn([
                                'name' => 'status',
                                'label' => 'Status',
                            ]);
        $this->crud->addColumn('author')->afterColumn('status');
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Judul',
                            ]);
        $this->crud->addColumn([
                                'name' => 'featured',
                                'label' => 'Featured',
                                'type' => 'check',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Category',
                                'type' => 'select',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                            ]);

        $this->crud->addColumn([
                                'name' => 'created_at',
                                'label' => 'created at',
                            ]);
        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
                                'name' => 'title',
                                'label' => 'Judul',
                                'type' => 'text',
                                'placeholder' => 'Your title here',
                            ]);
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Slug (URL)',
                                'type' => 'text',
                                'hint' => 'Will be automatically generated from your title, if left empty.',
                                // 'disabled' => 'disabled'
                            ]);

        $this->crud->addField([    // TEXT
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                                'value' => date('Y-m-d'),
                            ], 'create');
        $this->crud->addField([    // TEXT
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                            ], 'update');

        $this->crud->addField([    // TEXT
                                'name' => 'author',
                                'label' => 'Penulis',
                                'type' => 'text',
                            ]);

        $this->crud->addField([    // WYSIWYG
                                'name' => 'content',
                                'label' => 'Content',
                                'type' => 'tinymce',
                                'placeholder' => 'Your textarea text here',
                            ]);
        $this->crud->addField([    // Image
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'browse',
                            ]);
        $this->crud->addField([    // SELECT
                                'label' => 'Category',
                                'type' => 'select2',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                            ]);
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
                                'label' => 'Tags',
                                'type' => 'select2_multiple',
                                'name' => 'tags', // the method that defines the relationship in your Model
                                'entity' => 'tags', // the method that defines the relationship in your Model
                                'attribute' => 'name', // foreign key attribute that is shown to user
                                'model' => "App\Models\Tag", // foreign key model
                                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                            ]);
        $this->crud->addField([    // ENUM
                                'name' => 'status',
                                'label' => 'Status',
                                'type' => 'enum',
                            ]);
        $this->crud->addField([    // CHECKBOX
                                'name' => 'featured',
                                'label' => 'Featured item',
                                'type' => 'checkbox',
                            ]);

        $this->crud->enableAjaxTable();

        $this->crud->orderBy('date', 'desc');
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }


    //for news page
    public function news() {
        $news = Article::where('category_id','!=', 8)->where('category_id','!=', 10)->orderBy('date', 'desc')->paginate(6);
        return view('articles.news',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    //for article detail page
    public function show($slug) {
        $article = Article::where('slug',$slug)->first();
        $tanggal = date('d M Y', strtotime($article->date));
        // $article_id = $this->crud->getEntry($article->id);
        $article_id = $article->id;
        $galleries = Gallery::where('article_id',$article_id)->get();
        $beritas = Article::take(5)->where('category_id','!=', 8)->where('category_id','!=', 10)->orderBy('id','desc')->get();
        return view('articles.show')->with(compact('article','beritas','galleries','tanggal'));
    }
    //for seismisitas
    public function seismisitasShow($slug) {
        $infografis = Article::where('slug',$slug)->first();
        $infografis_id = $infografis->id;
        $galleries = Gallery::where('article_id',$infografis_id)->get();
        $seismisitas = Article::take(5)->where('category_id', 8)->orderBy('id','desc')->get();
        return view('kegempaans.show')->with(compact('infografis','galleries','seismisitas'));
    }

    //for news page
    public function seismisitas() {
        $kegempaans = Article::where('category_id', 8)->orderBy('date', 'desc')->paginate(6);
        return view('kegempaans.kegempaan',compact('kegempaans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    // Artikel Populer

        //for seismisitas
    public function populerShow($slug) {
        $populer = Article::where('slug',$slug)->first();
        $populer_id = $populer->id;
        $thumbnails = Gallery::where('article_id',$populer_id)->get();
        $populers = Article::take(5)->where('category_id', 10)->orderBy('id','desc')->get();
        return view('populers.show')->with(compact('populer','thumbnails','populers'));
    }

    //for news page
    public function populer() {
        $populers = Article::where('category_id', 10)->orderBy('date', 'desc')->paginate(6);
        return view('populers.populer',compact('populers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



}
