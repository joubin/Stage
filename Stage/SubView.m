//
//  SubView.m
//  Stage
//
//  Created by Joubin Jabbari on 12/20/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "SubView.h"

@implementation SubView
- (instancetype)init
{
    self = [super init];
    [self setBackgroundColor:[UIColor clearColor]];
    [self setUserInteractionEnabled:YES];
    if (self) {

    }
    return self;
}

- (BOOL)pointInside:(CGPoint)point withEvent:(UIEvent *)event {
    BOOL pointInside = NO;
    
    if (CGRectContainsPoint(self.frame, point)) pointInside = YES;
    
    return pointInside;
}

@end
