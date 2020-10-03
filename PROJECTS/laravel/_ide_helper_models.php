<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace LaraCourse\Models{
/**
 * LaraCourse\Models\Album
 *
 * @property int $id
 * @property string $album_name
 * @property string|null $album_thumb
 * @property string|null $description
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaraCourse\Models\AlbumCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read mixed $path
 * @property-read mixed $short_descr
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaraCourse\Models\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \LaraCourse\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereAlbumName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereAlbumThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUserId($value)
 */
	class Album extends \Eloquent {}
}

namespace LaraCourse\Models{
/**
 * LaraCourse\Models\AlbumCategory
 *
 * @property int $id
 * @property string $category_name
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaraCourse\Models\Album[] $albums
 * @property-read int|null $albums_count
 * @property-read \LaraCourse\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory getCategoriesByUserId(\LaraCourse\Models\User $user)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereUserId($value)
 */
	class AlbumCategory extends \Eloquent {}
}

namespace LaraCourse\Models{
/**
 * LaraCourse\Models\AlbumsCategory
 *
 * @property int $id
 * @property int $album_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumsCategory whereUpdatedAt($value)
 */
	class AlbumsCategory extends \Eloquent {}
}

namespace LaraCourse\Models{
/**
 * LaraCourse\Models\Photo
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $name
 * @property string|null $description
 * @property int $album_id
 * @property string $img_path
 * @property-read \LaraCourse\Models\Album $album
 * @property-read mixed $path
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereUpdatedAt($value)
 */
	class Photo extends \Eloquent {}
}

namespace LaraCourse\Models{
/**
 * LaraCourse\Models\Test
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test query()
 */
	class Test extends \Eloquent {}
}

namespace LaraCourse\Models{
/**
 * LaraCourse\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $email_verified_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaraCourse\Models\AlbumCategory[] $albumCategories
 * @property-read int|null $album_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaraCourse\Models\Album[] $albums
 * @property-read int|null $albums_count
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace LaraCourse\Models{
/**
 * LaraCourse\Models\Video
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdatedAt($value)
 */
	class Video extends \Eloquent {}
}

