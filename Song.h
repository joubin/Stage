//
//  Song.h
//  Stage
//
//  Created by Joubin Jabbari on 12/29/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <Foundation/Foundation.h>
#import <Parse/Parse.h>
#import <AVFoundation/AVFoundation.h>
#import <MediaPlayer/MediaPlayer.h>

@interface Song : NSObject
-(id) initWithPFObject:(PFObject *)object;

@end
